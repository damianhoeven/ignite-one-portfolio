<?php
/** @var \Kirby\Cms\Block $block */

$alt  = $block->alt();
$src  = null;

if ($block->location()->value() === 'web') {
  $src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
  $alt = $alt->or($image->alt());
  $src = $image->url();
}
?>

<?php if ($src): ?>
<section class="section theme-light block-fullwidth single-image" data-scroll-section>
  <img class="overlay overlay-media" src="<?= $src ?>" alt="<?= $alt->esc() ?>" data-scroll data-scroll-speed="-3">
</section>
<?php endif ?>
