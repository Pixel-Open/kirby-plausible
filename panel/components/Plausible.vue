<template>
    <k-inside>
        <k-view class="k-plausible-view">
            <k-header>{{ $t('pixelopen.plausible.panel.title') }}</k-header>
            <iframe v-if="plausibleLink" plausible-embed
                :src="plausibleLink + '&embed=true&theme=light&background=%23efefef'" ref="plausibleIframe" width="100%"
                :height="height_iframe + 'px'" loading="lazy" scrolling="no" frameborder="0"
                class="plausible-iframe" @load="iframeLoad"></iframe>
            <div v-else style="margin-top: 30px; text-align: center;">
                <code>{{ $t('pixelopen.plausible.panel.nolink') }}</code>
            </div>
            <div class="k-item" data-has-image="true" data-layout="list" ref="noIframe">
                <figure class="k-frame k-icon-frame k-item-image" style="--fit: cover; --ratio: 1/1; --back: var(--color-red-200);">
                    <svg aria-hidden="true" data-type="alert" class="k-icon" style="color: var(--color-red);"><use xlink:href="#icon-alert"></use></svg>
                </figure>
                <div class="k-item-content">
                    <h3 title="Le débogage doit être désactivé en production" class="k-item-title">
                        <span>{{ $t('pixelopen.plausible.panel.noiframe') }}</span>
                    </h3>
                </div>
            </div>
        </k-view>
    </k-inside>
</template>

<script>
export default {
    props: {
        plausibleLink: String,
        height_iframe: Number
    },
    methods: {
        iframeLoad() {
            this.$refs.noIframe.hidden = true;
        }
    }
}
</script>