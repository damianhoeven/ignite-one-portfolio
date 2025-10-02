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

    <main class="main" data-barba="container" data-barba-namespace="about">
        <?php snippet('navigation') ?>
        
        <div class="main-wrap" data-scroll-container>

            <header class="section about-hero-section <?= $isDark ? 'theme-dark' : 'theme-light' ?>" data-scroll-section>
                <div class="overlay hero-video-wrap playpauze">
                    <video autoplay muted loop><source src="<?= url('assets/videos/hero-bg-video.mp4') ?>" type="video/mp4"></video>
                </div>

                <div class="container">
                    <div class="hero-content">
                        <h1><?= $page->pageTitle()->kirbytextinline() ?></h1>
                        <p class="once-in"><?= $page->subTitle() ?></p>
                    </div>
                </div>
            </header>

            <div class="top-page-wrap" data-scroll-section>
                <div class="section about-intro-section theme-light">
                    <div class="container">
                        <div class="row third-reverse">
                            <div class="col">
                                <p>
                                    Ignite One gaat over die ene vonk die alles in beweging zet. Elk merk is uniek en verdient het om écht gezien en gevoeld te worden. Daarom help ik verhalen vertellen die raken, vlammen én blijven hangen.
                                </p>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section mission-vision-section theme-light">
                    <div class="container">
                        <div class="row split third">
                            <div class="flex-col">
                                <img src="//placehold.co/780x900" alt="" />
                            </div>
                            <div class="flex-col">
                                <div class="text">
                                    <p>
                                        Vanuit mijn liefde voor creativiteit, storytelling en design ben ik gestart met Ignite One. Mijn kracht ligt in het combineren van creatieve concepten met een strategische blik, waardoor verhalen écht gaan leven. 
                                    </p>
                                    <p>
                                        Wat mij drijft? Merken helpen hun unieke ‘vonk’ te vinden en deze te vertalen naar een sterke uitstraling
                                    </p>
                                </div>

                                <div class="row split">
                                    <div class="col">
                                        <div class="text">
                                            <h3>Missie</h3>
                                            <p>
                                                Ik help bedrijven en merken om hun verhaal helder, creatief en authentiek naar buiten te brengen.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="text">
                                            <h3>Visie</h3>
                                            <p>
                                                Ik geloof dat employer branding, content en design pas écht werken als ze voortkomen uit een authentiek verhaal. Één merk, één verhaal, één vonk.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php snippet('footer') ?>
        </div>
    </main>
</body>
</html>

