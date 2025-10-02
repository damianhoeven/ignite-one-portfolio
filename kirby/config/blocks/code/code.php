<?php /** @var \Kirby\Cms\Block $block */ ?>
<section class="section" data-scroll-section>
    <pre><code class="language-<?= $block->language()->or('text') ?>"><?= $block->code()->html(false) ?></code></pre>
</section>
