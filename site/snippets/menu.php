<ul>
    <?php foreach ($items as $item): ?>
    <li>
        <a href="<?= $item->url() ?>"><?= $item->title() ?></a>

        <?php if($item->isOpen() && $item->hasListedChildren()): ?>
            <?php snippet('menu', ['items' => $item->children()->listed()]) ?>
        <?php endif ?>
    </li>
    <?php endforeach ?>
</ul>
