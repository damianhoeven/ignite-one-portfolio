<?php /** @var \Kirby\Cms\Block $block */ ?>
<section class="section single-block" data-scroll-section>
  <div class="container">
    <blockquote>
      <?= $block->text() ?>
      <?php if ($block->citation()->isNotEmpty()): ?>
      <footer>
        <?= $block->citation() ?>
      </footer>
      <?php endif ?>
    </blockquote>
  </div>
</section>
