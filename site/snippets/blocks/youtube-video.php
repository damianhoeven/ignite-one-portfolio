<?php
/** @var \Kirby\Cms\Block $block */

/**
 * YouTube ID uit URL/ID halen
 */
$raw = trim((string)$block->url()->value());
$id  = null;

if (preg_match('~^(?:https?://)?(?:www\.)?(?:m\.)?(?:youtu\.be/|youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/))([A-Za-z0-9_-]{11})~', $raw, $m)) {
  $id = $m[1];
} elseif (preg_match('~^[A-Za-z0-9_-]{11}$~', $raw)) {
  $id = $raw;
}
if (!$id) return; // ongeldig → niets renderen

// Opties
$privacy  = $block->privacy()->toBool();
$autoplay = $block->autoplay()->toBool();
$mute     = $block->mute()->toBool();
$controls = $block->controls()->toBool();
$loop     = $block->loop()->toBool();
$start    = max(0, (int)$block->start()->value());
$end      = max(0, (int)$block->end()->value());

// Query params
$params = [
  'rel'            => 0,
  'modestbranding' => 1,
  'playsinline'    => 1,
  'autoplay'       => $autoplay ? 1 : 0,
  'mute'           => $mute ? 1 : 0,
  'controls'       => $controls ? 1 : 0,
  'loop'           => $loop ? 1 : 0,
  'start'          => $start ?: null,
  'end'            => $end ?: null,
];
// Loop vereist ook &playlist={id}
if ($loop) {
  $params['playlist'] = $id;
}
// Filter lege/nulls
$params = array_filter($params, fn($v) => $v !== null);

// Embed URL
$host = $privacy ? 'https://www.youtube-nocookie.com' : 'https://www.youtube.com';
$src  = $host . '/embed/' . $id . '?' . http_build_query($params);

// Classes (padding/theme zoals je eerdere blocks)
$classes = ['section', 'single-block', 'video-youtube'];
if ($block->paddingBottom()->toBool()) $classes[] = 'padding-bottom';
if (!$block->colorTheme()->toBool())   $classes[] = 'theme-light'; // false = licht
$caption = $block->caption()->kt();
?>
<section class="<?= implode(' ', $classes) ?>" data-scroll-section>
  <div class="container">
    <figure class="video-embed">
      <iframe
        src="<?= esc($src) ?>"
        title="YouTube video"
        loading="lazy"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin"
        allowfullscreen
      ></iframe>
      <?php if ($caption->isNotEmpty()): ?>
        <figcaption><?= $caption ?></figcaption>
      <?php endif; ?>
    </figure>
  </div>
</section>
