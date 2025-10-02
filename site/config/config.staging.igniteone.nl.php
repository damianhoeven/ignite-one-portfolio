<?php

return [
  'debug' => false,
  'url'   => 'https://staging.igniteone.nl',

  // Eventueel: driver overschrijven als server Imagick heeft
  // (alleen doen als je zeker weet dat Imagick draait op staging)
  // 'thumbs.driver' => 'im',

  // Voorzichtige cache aan
  'cache' => [
    'pages' => [
      'active' => true,
    ],
  ],
];
