<?php /** @var \Kirby\Cms\Block $block */
$addPadding = $block->paddingBottom()->toBool();
$isDark     = $block->colorTheme()->toBool();

$classes = ['section','single-block'];
if ($addPadding) $classes[] = 'padding-bottom';
if (!$isDark)    $classes[] = 'theme-light';
?>
<section class="<?= implode(' ', $classes) ?>" data-scroll-section>
  <div class="container">
    <div class="row small">
      <div class="text">
        <?= $block->text() ?>
      </div>
    </div>
  </div>
</section>
