<?php

Kirby::plugin('pixelopen/kirby-plausible', [
    'snippets' => [
        'plausible' => __DIR__ . '/snippets/plausible.php',
    ],
    'areas' => [
        'plausible' => function ($kirby) {
            return [
                'label' => t('pixelopen.plausible.panel.name'),
                'icon' => 'chart',
                'menu' => true,
                'link' => 'plausible',
                'views' => [
                    [
                        'pattern' => 'plausible',
                        'action' => function () {
                            return [
                                'component' => 'plausible',
                                'title' => t('pixelopen.plausible.panel.title'),
                                'props' => [
                                    'plausibleLink' => option('pixelopen.plausible.plausibleLink'),
                                    'height_iframe' => option('pixelopen.plausible.height_iframe') ?? 2000,
                                ],
                            ];
                        },
                    ],
                ],
            ];
        },
    ],
    'translations' => [
        'en' => require __DIR__ . '/translations/en.php',
        'fr' => require __DIR__ . '/translations/fr.php',
    ],
]);
