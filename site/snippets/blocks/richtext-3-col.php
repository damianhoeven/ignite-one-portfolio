<?php /** @var \Kirby\Cms\Block $block */
$addPadding = $block->paddingBottom()->toBool();
$isDark     = $block->colorTheme()->toBool();

$classes = ['section','single-block'];
if ($addPadding) $classes[] = 'padding-bottom';
if (!$isDark)    $classes[] = 'theme-light';
?>
<section class="<?= implode(' ', $classes) ?>" data-scroll-section>
  <div class="container">
    <div class="row split three-columns">
      <div class="col">
        <div class="text">
          <?= $block->textCol1() ?>
        </div>
      </div>
      <div class="col">
        <div class="text">
          <?= $block->textCol2() ?>
        </div>
      </div>
      <div class="col">
        <div class="text">
          <?= $block->textCol3() ?>
        </div>
      </div>
    </div>
  </div>
</section>
