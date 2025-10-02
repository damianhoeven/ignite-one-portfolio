<?php
/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
$isDark = $page->colorTheme()->value() === 'dark';
?>

<?php snippet('head') ?>
<body class="theme-light" data-barba="wrapper">
    <?php snippet('loading-screen') ?>

    <main class="main" data-barba="container" data-barba-namespace="contact">
        <?php snippet('navigation') ?>

        <div class="main-wrap" data-scroll-container>
            <header class="contact-hero-section" data-scroll-section>
                <div class="contact-hero-animation playpauze">
                    <h1>
                        <span class="outer-span" data-scroll data-scroll-speed="-1.5" data-scroll-direction="horizontal"><span>Let's</span></span>
                        <span class="outer-span" data-scroll data-scroll-speed="1" data-scroll-direction="horizontal"><span><em>work</em></span></span>
                        <span class="outer-span" data-scroll data-scroll-speed="0.75" data-scroll-direction="horizontal"><span>together</span></span>
                    </h1>
                    <!-- <img data-scroll data-scroll-speed="1" src="//placehold.co/1200x750/000000/FFF" alt="" /> -->
                    <video autoplay muted loop data-scroll data-scroll-speed="1"><source src="<?= url('assets/videos/hero-bg-video.mp4') ?>" type="video/mp4"></video>
                </div>
            </header>

            <section class="section contact-content-section theme-light" data-scroll-section=>
                <div class="container">
                    <div class="row split once-in">
                        <div class="col">
                            <div class="row">
                                <div class="text">
                                    <p>
                                        Tijd om jouw branding te laten vlammen?<br/>Stuur me een bericht en laten kijken of we elkaar kunnen helpen
                                    </p>
                                </div>
                            </div>

                            <div class="row split">
                                <div class="col">
                                    <div class="text">
                                        <h2 class="section-title gray">Contact gegevens</h2>
                                        <ul>
                                            <li>
                                                <a href="" class="btn btn-click">
                                                    <div class="btn-fill"></div>
                                                    <div class="btn-text">
                                                        <span>damian@igniteone.nl</span>
                                                        <span class="serif">damian@igniteone.nl</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>  
                                                <a href="" class="btn btn-click">
                                                    <div class="btn-fill"></div>
                                                    <div class="btn-text">
                                                        <span>+31 6 23 53 32 38</span>
                                                        <span class="serif">+31 6 23 53 32 38</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                        <h2 class="section-title gray">Adres</h2>
                                        <ul>
                                            <li>Boterbloem 3,</li>
                                            <li>2671 WS, Naaldwijk</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="text">
                                        <h2 class="section-title gray">Socials</h2>
                                        <ul>
                                            <li>
                                                <a href="" class="btn btn-click">
                                                    <div class="btn-fill"></div>
                                                    <div class="btn-text">
                                                        <span>LinkedIn</span>
                                                        <span class="serif">LinkedIn</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>  
                                                <a href="" class="btn btn-click">
                                                    <div class="btn-fill"></div>
                                                    <div class="btn-text">
                                                        <span>Instagram</span>
                                                        <span class="serif">Instagram</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>  
                                                <a href="" class="btn btn-click">
                                                    <div class="btn-fill"></div>
                                                    <div class="btn-text">
                                                        <span>TikTok</span>
                                                        <span class="serif">TikTok</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <ul class="contact-action-list">
                                <li>
                                    <a href="" title="">
                                        <span>Whatsapp</span>
                                        <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="">
                                        <span>E-mail</span>
                                        <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="">
                                        <span>Bel</span>
                                        <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <?php snippet('footer') ?>
        </div>
    </main>
</body>
</html>

