<template>
    <k-inside>
        <k-view class="k-plausible-view">
            <k-header>{{ $t('pixelopen.plausible.panel.title') }}</k-header>
            <iframe v-if="plausibleLink" plausible-embed :src="plausibleLink + '&embed=true&theme=light&background=%23efefef'" width="100%" :height="height_iframe + 'px'" loading="lazy" scrolling="no" frameborder="0" class="plausible-iframe"></iframe>
            <div v-else style="margin-top: 30px; text-align: center;">
                <code>{{ $t('pixelopen.plausible.panel.nolink') }}</code>
            </div>
        </k-view>
    </k-inside>
</template>

<script>
    export default {
        props: {
            plausibleLink: String,
            height_iframe: Number
        }
    }
</script>