<?php
/** @var \Kirby\Cms\Block $block */

$files = $block->videos()->toFiles();
if ($files->isEmpty()) return;

$count = min($files->count(), 3);
$files = $files->limit(3);

// classes voor sectie
$classes = ['section','single-block','video-file-multi'];
if ($block->paddingBottom()->toBool()) $classes[] = 'padding-bottom';
if (!$block->colorTheme()->toBool())   $classes[] = 'theme-light';

// layout-classes voor row
$rowClasses = ['row'];
if ($count === 2 || $count === 3) $rowClasses[] = 'split';

$rowStyle = ($count === 3) ? ' style="--columns: 3;"' : '';

// ratio parsen (fallback 16:9)
$ratioStr = $block->ratio()->or('16:9')->value();
if (preg_match('~^(\d+)\s*[:/x]\s*(\d+)$~', $ratioStr, $m)) {
  $rw = max(1, (int)$m[1]);
  $rh = max(1, (int)$m[2]);
} else {
  $rw = 16; $rh = 9;
}
$aspect = $rw . ' / ' . $rh;
?>
<section class="<?= implode(' ', $classes) ?>" data-scroll-section>
  <div class="container">
    <div class="<?= implode(' ', $rowClasses) ?>"<?= $rowStyle ?>>
      <?php foreach ($files as $video): ?>
        <div class="col">
          <figure class="video-embed playpauze" style="aspect-ratio: <?= $aspect ?>;">
            <video
              class="video-file__media"
              src="<?= $video->url() ?>"
              autoplay
              muted
              loop
              playsinline
              preload="auto"
            ></video>
          </figure>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
