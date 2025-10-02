<?php
/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
?>

<?php snippet('head') ?>
<body class="theme-light" data-barba="wrapper">
    <?php snippet('loading-screen') ?>

    <main class="main" data-barba="container" data-barba-namespace="single-project">
        <?php snippet('navigation') ?>

        <div class="main-wrap" data-scroll-container>    
            <section class="section project-hero-section theme-light" data-scroll-section>
                <div class="container">
                    <div class="row split">
                        <div class="col">
                            <h1><?= $page->title()->kirbytextinline() ?></h1>
                            <p class="once-in"><?= $page->subTitle() ?></p>
                        </div>

                        <?php if ($page->link()->isNotEmpty()): ?>
                            <div class="flex-col">
                                <a href="<?= $page->link() ?>" title="Bekijk website" target="_blank">
                                    <span>Bekijk website</span>
                                    <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                                    </svg>
                                </a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </section>

            <section class="section project-details-section" data-scroll-section>
                <div class="container">
                    <div class="row split once-in">  
                        <div class="col">         
                            <?php if ($page->text()): ?>
                                <span>Introductie</span>
                                <p><?= $page->text() ?></p>
                            <?php endif ?>
                        </div>

                        <div class="col">
                            <?php if ($page->services()->isNotEmpty()): ?>
                                <div class="project-detail-wrapper">
                                    <span>Services</span>
                                    <ul class="services">
                                        <?php foreach ($page->services()->split() as $service): ?>
                                            <li><?= esc($service) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif ?>

                            <div class="row split">
                                <div class="col">
                                    <?php if ($page->client()->isNotEmpty()): ?>
                                        <span>Credits</span>
                                        <p><?= $page->client() ?></p>
                                    <?php endif ?>
                                </div>

                                <div class="col">
                                    <?php if ($page->year()->isNotEmpty()): ?>
                                        <span>Jaar</span>
                                        <p><?= $page->year() ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php if ($img = $page->pageImage()->toFile()): ?>
            <?php
            // Hero: 16:9 crop
            $hero = $img->crop(1920, 1080);
            $src  = $hero->url();
            $alt  = $img->alt()->or($page->title())->esc();

            // Logo (optioneel)
            $logoUrl = $logoAlt = null;
            if ($logo = $page->clientLogo()->toFile()) {
                // Gebruik thumb() voor opties; zo blijft transparantie behouden
                $logo1x = $logo->thumb(['width' => 240, 'format' => 'png'])->url();
                $logo2x = $logo->thumb(['width' => 480, 'format' => 'png'])->url();
                $logoUrl = $logo1x;   // basisbron
                $logoAlt = $page->client()->or('Klantlogo')->esc();
            }
            ?>
            <section class="section block-fullwidth single-image intro-image playpauze" data-scroll-section>
                <img
                class="overlay overlay-media"
                src="<?= $src ?>"
                alt="<?= $alt ?>"
                data-scroll
                data-scroll-speed="-3"
                loading="lazy"
                decoding="async"
                >

                <?php if ($logoUrl): ?>
                <img
                    class="overlay-logo"
                    src="<?= $logoUrl ?>"
                    srcset="<?= $logo1x ?> 1x, <?= $logo2x ?> 2x"
                    alt="<?= $logoAlt ?>"
                    loading="lazy"
                    decoding="async"
                >
                <?php endif; ?>
            </section>
            <?php endif; ?>
        
            <?= $page->blocks()->toBlocks() ?>

            <?php snippet('footer') ?>
        </div>
    </main>
</body>
</html>