<?php if (option('debug') !== true): ?>
<?php
    $siteUrl = $kirby->url('index');
    $parsedUrl = parse_url($siteUrl);
    $domain = $parsedUrl['host'] ?? '';
    
    if (!empty($domain) && preg_match('/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $domain)):
?>
    <script defer data-domain="<?= esc($domain) ?>" src="https://plausible.io/js/plausible.js"></script>
<?php endif; ?>
<?php endif ?>