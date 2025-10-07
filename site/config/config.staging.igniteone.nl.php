<?php

return [
  'debug' => false,
  'url'   => 'https://staging.igniteone.nl',
  'app.noindex' => true,

  // Voor staging vaak prima: cache aan
  'cache' => [
    'pages' => [
      'active' => true,
    ],
  ],

  // Optioneel als je Imagick op de server hebt:
  // 'thumbs.driver' => 'im',
];
