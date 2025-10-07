<?php

return [
  // Gedeelde defaults
  'debug'  => false,          // basis uit; override je lokaal
  'locale' => 'nl_NL',

  // Plugin-opts die overal gelijk zijn
  'tobimori.seo.lang' => 'nl_NL',

  // Thumbs: algemene defaults
  'thumbs' => [
    'driver'  => 'gd',  // evt. per omgeving overschrijven als server Imagick heeft
    'quality' => 82,
    'format'  => 'jpg',
  ],

  // Hooks / runtime gedrag – geldt voor alle omgevingen
  'ready' => function ($kirby) {
    return [
      'pechente.kirby-admin-bar' => [
        'active' => $kirby->user() !== null
      ],
    ];
  },
];
