<template>
    <k-panel-inside>
        <k-view class="k-plausible-view">
            <k-header>{{ $t("pixelopen.plausible.panel.title") }}</k-header>
            <iframe
                v-if="isValidPlausibleLink"
                plausible-embed
                :src="iframeSrc"
                ref="plausibleIframe"
                width="100%"
                :height="iframeHeight"
                loading="lazy"
                scrolling="no"
                frameborder="0"
                class="plausible-iframe"
                @load="onIframeLoad"
                @error="onIframeError"
            ></iframe>
            <div v-else class="k-plausible-nolink">
                <code>{{ $t("pixelopen.plausible.panel.nolink") }}</code>
            </div>
            <div
                v-show="showErrorMessage"
                class="k-item"
                data-has-image="true"
                data-layout="list"
                ref="noIframe"
            >
                <figure class="k-frame k-icon-frame k-item-image k-plausible-error-icon">
                    <svg
                        aria-hidden="true"
                        data-type="alert"
                        class="k-icon"
                    >
                        <use xlink:href="#icon-alert"></use>
                    </svg>
                </figure>
                <div class="k-item-content">
                    <h3 class="k-item-title">
                        <span>{{ $t("pixelopen.plausible.panel.noiframe") }}</span>
                    </h3>
                </div>
            </div>
        </k-view>
    </k-panel-inside>
</template>

<script>
export default {
    props: {
        plausibleLink: {
            type: String,
            default: '',
            validator: (value) => {
                if (!value) return true;
                try {
                    const url = new URL(value);
                    return url.hostname === 'plausible.io';
                } catch {
                    return false;
                }
            }
        },
        height_iframe: {
            type: Number,
            default: 2000,
            validator: (value) => value > 0 && value <= 10000
        },
    },
    data() {
        return {
            showErrorMessage: false,
            iframeLoaded: false
        };
    },
    computed: {
        isValidPlausibleLink() {
            return this.plausibleLink && this.plausibleLink.trim() !== '';
        },
        iframeSrc() {
            if (!this.isValidPlausibleLink) return '';
            
            const separator = this.plausibleLink.includes('?') ? '&' : '?';
            return `${this.plausibleLink}${separator}embed=true&theme=light&background=%23efefef`;
        },
        iframeHeight() {
            return `${this.height_iframe}px`;
        }
    },
    methods: {
        onIframeLoad() {
            this.iframeLoaded = true;
            this.showErrorMessage = false;
        },
        onIframeError() {
            this.showErrorMessage = true;
        }
    },
};
</script>

<style scoped>
.k-plausible-view {
    padding: 0;
}

.k-plausible-nolink {
    margin-top: 30px;
    text-align: center;
    padding: 1rem;
}

.k-plausible-error-icon {
    --fit: cover;
    --ratio: 1/1;
    --back: var(--color-red-200);
}

.k-plausible-error-icon .k-icon {
    color: var(--color-red);
}

.plausible-iframe {
    border: 1px solid var(--color-gray-200);
    border-radius: var(--rounded);
}
</style>
