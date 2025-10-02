<?php
/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
$isDark = $page->colorTheme()->value() === 'dark';
?>

<?php snippet('head') ?>
<body class="<?= $isDark ? 'theme-dark' : 'theme-light' ?>" data-barba="wrapper">
    <?php snippet('loading-screen') ?>

    <main class="main" data-barba="container" data-barba-namespace="page-single">
        <?php snippet('navigation') ?>
        
        <div class="main-wrap" data-scroll-container>

            <header class="section hero-section <?= $isDark ? 'theme-dark' : 'theme-light' ?>" data-scroll-section>
                <div class="container">
                    <div class="row <?= $page->headerRowSmall()->toBool() ? 'small' : '' ?>">
                        <h1><?= $page->title() ?></h1>
                        <p><?= $page->subTitle() ?></p>
                    </div>
                </div>
            </header>

            <?= $page->blocks()->toBlocks() ?>

            <?php snippet('footer') ?>
        </div>
    </main>
</body>
</html>

