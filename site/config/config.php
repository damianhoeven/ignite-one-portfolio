<?php

return [
  // Gedeelde defaults
  'debug'  => false,          // basis uit; override je lokaal
  'locale' => 'nl_NL',

  // Plugin-opts die overal gelijk zijn
  'tobimori.seo.lang' => 'nl_NL',

  // Thumbs: algemene defaults
  'thumbs' => [
    'driver'  => 'gd',  // kun je per omgeving overschrijven als server Imagick heeft
    'quality' => 82,
    'format'  => 'jpg',
    // 'upscale' => true, // laat uit tenzij je het overal wilt
  ],

  // Hooks / runtime afgeleid gedrag – geldt voor alle omgevingen
  'ready' => function ($kirby) {
    return [
      'pechente.kirby-admin-bar' => [
        'active' => $kirby->user() !== null
      ],
    ];
  },
];
