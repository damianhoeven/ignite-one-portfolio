<?php

return [
    'debug' => true,
    'locale' => 'nl_NL',
    'tobimori.seo.lang' => 'nl_NL',
    'thumbs' => [
        'driver'  => 'gd',   // of 'im' (Imagick)
        'quality' => 82,
        'format'  => 'jpg',
        // 'upscale' => true, // zet aan als je bron kleiner is dan 400x225
    ],
    'ready' => function ($kirby) {
        return [
            'pechente.kirby-admin-bar' => [
                'active' => $kirby->user() !== null
            ]
        ];
    },
];
