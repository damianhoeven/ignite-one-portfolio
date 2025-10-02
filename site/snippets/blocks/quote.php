<?php /** @var \Kirby\Cms\Block $block */
$addPadding = $block->paddingBottom()->toBool();
$isDark     = $block->colorTheme()->toBool();

$classes = ['section','single-block'];
if ($addPadding) $classes[] = 'padding-bottom';
if (!$isDark)    $classes[] = 'theme-light';

$name    = $block->name()->value();
$company = $block->company()->value();
?>
<section class="<?= implode(' ', $classes) ?>" data-scroll-section>
  <div class="container">
    <div class="row small">
      <figure class="quote">
        <svg width="125" height="108" viewBox="0 0 125 108" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M23.9793 0C10.7397 0 0 10.989 0 24.5473C0 38.0974 10.7397 49.0946 23.9793 49.0946C47.9503 49.0946 31.9724 96.5446 0 96.5446V108C57.0618 108.008 79.4211 0 23.9793 0ZM93.0554 0C79.824 0 69.0843 10.989 69.0843 24.5473C69.0843 38.0974 79.824 49.0946 93.0554 49.0946C117.035 49.0946 101.057 96.5446 69.0843 96.5446V108C126.138 108.008 148.497 0 93.0554 0Z" fill="black"/>
        </svg>
        <div class="inner-quote">
          <blockquote>
            <?= $block->quote()->kirbytextinline() ?>
          </blockquote>

          <?php if (!empty($name) || !empty($company)): ?>
            <figcaption>
              <?php if (!empty($name)): ?>
                <span class="quote-name"><?= esc($name) ?></span>
              <?php endif; ?>
              <?php if (!empty($company)): ?>
                <span class="quote-company"><?= esc($company) ?></span>
              <?php endif; ?>
            </figcaption>
          <?php endif; ?>
        </div>
      </figure>
    </div>
  </div>
</section>
