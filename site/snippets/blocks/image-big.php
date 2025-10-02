<?php
/** @var \Kirby\Cms\Block $block */

$alt  = $block->alt();
$src  = null;

// toggles
$addPadding = $block->paddingBottom()->toBool(); // true => class 'padding-bottom'
$isDark     = $block->colorTheme()->toBool();    // true => donker, geen theme-light

// bron bepalen
if ($block->location()->value() === 'web') {
  // Web: geen crop mogelijk
  $src = $block->src()->esc();

} elseif ($file = $block->image()->toFile()) {
  // Upload: ALT aanvullen & server-side croppen (16:9)
  $alt = $alt->or($file->alt());
  $thumb = $file->crop(1920, 1080); // pas maten aan naar je site
  $src = $thumb->url();
}

// classes opbouwen
$classes = ['section', 'single-block', 'image-big'];
if ($addPadding) $classes[] = 'padding-bottom';
if (!$isDark)    $classes[] = 'theme-light'; // bij Licht = true class toevoegen
?>

<?php if ($src): ?>
<section class="<?= implode(' ', $classes) ?>" data-scroll-section>
  <div class="container">
    <div class="single-image">
      <img
        class="overlay overlay-media"
        src="<?= $src ?>"
        alt="<?= $alt->esc() ?>"
        data-scroll
        data-scroll-speed="-1"
        loading="lazy"
        decoding="async"
      >
    </div>
  </div>
</section>
<?php endif; ?>
