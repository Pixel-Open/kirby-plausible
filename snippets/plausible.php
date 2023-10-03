<?php if(option('debug') !== true): ?>
    <script defer data-domain="<?= parse_url(
        $kirby->url('index')
    )['host'] ?>" src="https://plausible.io/js/plausible.js"></script>
<?php endif ?>