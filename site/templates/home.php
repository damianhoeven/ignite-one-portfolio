<?php
/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
?>

<?php snippet('head') ?>
<body data-barba="wrapper">
    <?php snippet('loading-screen') ?>

    <main class="main" data-barba="container" data-barba-namespace="home">
        <?php snippet('navigation') ?>

        <div class="main-wrap" data-scroll-container>

            <header class="section home-hero" data-scroll-section data-target="#projects">
                <div class="overlay hero-video-wrap hero-scroll-animation playpauze" data-scroll data-scroll-speed="-3">
                    <video autoplay muted loop><source src="<?= url('assets/videos/hero-bg-video.mp4') ?>" type="video/mp4"></video>
                </div>

                <div class="container" data-scroll data-scroll-speed="-5">
                    <div class="hero-content">
                        <h1><?= $page->Herotitle()->kirbytextinline() ?></h1>
                        <p class="once-in">
                            <?= nl2br($page->Heroparagraph()->html()) ?>
                        </p>
                    </div>

                    <div class="button-row once-in">
                        <a href="" title="" class="icon-button">
                            <span>Contact me</span>
                            <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                            </svg>
                        </a>
                        <!-- <a href="" title="" class="icon-button">
                            <span>Meer over mij</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                <path d="M12 6.5L0.75 0.00480938V12.9952L12 6.5Z"/>
                            </svg>
                        </a> -->
                    </div>
                </div>
            </header>

            <div class="top-page-wrap" data-scroll-section>
                <section class="section about-section">
                    <div class="container">
                        <div class="row third">
                            <div class="col">
                                <div class="skills">
                                    <h2 class="section-title gray"><?= $page->SkillsTitle() ?></h2>
                                    <ul>
                                        <?php foreach ($page->Skillslist()->toStructure() as $item): ?>
                                            <?php $skillPage = $item->skillpage()->toPage(); ?>
                                            <li>
                                                <?php if ($skillPage && $skillPage->url()): ?>
                                                    <a class="rounded-button" href="<?= $skillPage->url() ?>">
                                                        <?= esc($item->label()->or($skillPage->title())) ?>
                                                    </a>
                                                <?php else: ?>
                                                    <div class="rounded-button">
                                                        <?= esc($item->label()) ?>
                                                    </div>
                                                <?php endif ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <div class="about">
                                    <h2 class="section-title gray"><?= $page->AboutTitle() ?></h2>
                                    <p>
                                        <?= nl2br($page->AboutIntro()->html()) ?>
                                    </p>
                                    <a href="" class="btn btn-click">
                                        <div class="btn-fill"></div>
                                        <div class="btn-text">
                                            <span>Meer over mij</span>
                                            <span class="serif">Meer over mij</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section logo-marquee" id="projects">
                    <div class="row">
                        <div data-marquee-duplicate="2" data-marquee-scroll-direction-target="" data-marquee-direction="right" data-marquee-status="normal" data-marquee-speed="20" data-marquee-scroll-speed="10" class="marquee">
                            <div data-marquee-scroll-target="" class="marquee-inner">
                                <div data-marquee-collection-target="" class="marquee-inner-wrap">
                                    <?php $logos = page('globals')->files(); foreach ($logos as $logo): ?>
                                        <div class="logo-block"><img src="<?= $logo->url() ?>" alt="<?= $logo->alt()->or('Logo') ?>" /></div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section home-projects-section theme-light">
                    <div class="container">
                        <div class="row third">
                            <div class="col">
                                <h2 class="section-title"><?= $page->projectsTitle()->kirbytextinline() ?></h2>
                                <div class="button-row">
                                    <a href="/projecten" title="Meer projecten" class="btn btn-click btn-light">
                                        <div class="btn-fill"></div>
                                        <div class="btn-text">
                                            <span>Meer projecten</span>
                                            <span class="serif">Meer projecten</span>
                                        </div>
                                    </a>

                                    <!-- <a href="" title="" class="icon-button">
                                        <span>Contact me</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                            <path d="M1 16L16 1M16 1H1M16 1V16" stroke-width="2"/>
                                        </svg>
                                    </a> -->
                                </div>
                            </div>
                            <div class="col">
                                <?php snippet('projects', [
                                    'projects' => collection('projects-featured')
                                    ->limit(5)
                                ]) ?>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="mouse-pos-list-image mouse-pos-list-service no-select">
                        <?php foreach (collection('projects-featured')->limit(5) as $project): ?>
                        <li class="overlay mouse-pos-list-image-inner active">
                            <div class="overlay overlay-image">
                                <div
                                    class="overlay overlay-image-inner active-image lazy entered loaded"
                                    style="opacity: 1; background-position: center center; background-repeat: no-repeat; background-size: cover; background-image: url('<?= $project->image()->crop(760, 760)->url() ?>');"
                                    data-bg="<?= $project->image()->crop(760, 760)->url() ?>"
                                    data-ll-status="loaded">
                                </div>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </div> -->
                </section>
            </div>

            <section class="section services-section" data-scroll-section>
                <div class="container" data-scroll data-scroll-speed="-2" data-scroll-offset="-50%, 0%">
                    <div class="row third">
                        <div class="col">
                            <h2 class="section-title">
                                <span>Van <em>idee</em></span>
                                <span>naar impact</span>
                            </h2>
                        </div>
                        <div class="col">
                            <div class="contentpart">
                                <div class="text big">
                                    <p>
                                        Het draait niet alleen om ‘mooie plaatjes’, ik help merken bouwen die opvallen, aanzetten tot actie én bijblijven. Creatief als het kan. Strategisch als het moet. Doelgericht, altijd.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="services-grid">
                        <a href="" title="" class="service-item">
                            <img src="//placehold.co/1200x1500" alt="" />
                            <div class="service-top">
                                <h3>Videografie</h3>
                                <p>Laat zien wie je écht bent</p>
                            </div>
                            <div class="service-bottom">
                                <ul>
                                    <li>Employer branding video’s</li>
                                    <li>Social snippets</li>
                                    <li>Van script tot publicatie</li>
                                </ul>
                            </div>
                        </a>
                        
                        <a href="" title="" class="service-item">
                            <img src="//placehold.co/1200x1500" alt="" />
                            <div class="service-top">
                                <h3>Content strategie & funnels</h3>
                                <p>Zichtbaarheid die niet stilvalt</p>
                            </div>
                            <div class="service-bottom">
                                <ul>
                                    <li>Slimme funnels</li>
                                    <li>Content op maat</li>
                                    <li>Geen losse posts, maar structuur</li>
                                </ul>
                            </div>
                        </a>
                        
                        <a href="" title="" class="service-item">
                            <img src="//placehold.co/1200x1500" alt="" />
                            <div class="service-top">
                                <h3>Branding & Webdesign</h3>
                                <p>Een merk bouwen dat klopt, visueel én inhoudelijk</p>
                            </div>
                            <div class="service-bottom">
                                <ul>
                                    <li>Websites & visuals die opvallen</li>
                                    <li>Branding met karakter</li>
                                    <li>Conversiegerichte webdesigns</li>
                                </ul>
                            </div>
                        </a>
                        
                        <div href="" title="" class="service-item">
                            <img src="//placehold.co/1200x1500" alt="" />
                        </div>
                    </div>
                </div>
            </section>

            <section class="section steps-section" data-scroll-section>
                <div class="container">
                    <div class="row split">
                        <div class="col">
                            <span class="number-heading">1-4</span>
                        </div>
                        <div class="col">
                            <h2>
                                <span data-scroll data-scroll-speed="-0.5" data-scroll-direction="horizontal">Zo laat ik jouw</span>
                                <span data-scroll data-scroll-speed="-0.75" data-scroll-direction="horizontal">merk <em>vlammen</em></span>
                            </h2>
                        </div>
                    </div>

                    <div class="row split step-wrapper">
                        <div class="flex-col">
                            <span class="number"><em>01</em></span>
                            <h3>Kennismaken & intunen</h3>
                        </div>
                        <div class="flex-col">
                            <div class="step-description">
                                <strong>The Ignite Flow</strong>
                                <p>
                                    We duiken in je merk, doelen en doelgroep. Geen oppervlakkige intake, maar echt begrijpen wat er speelt.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row split step-wrapper">
                        <div class="flex-col">
                            <span class="number"><em>02</em></span>
                            <h3>Concept & strategie</h3>
                        </div>
                        <div class="flex-col">
                            <div class="step-description">
                                <strong>Van Vonk naar Vlam</strong>
                                <p>
                                    Ik vertaal je doel naar een krachtig plan: video’s, funnels, branding afgestemd op jouw situatie.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row split step-wrapper">
                        <div class="flex-col">
                            <span class="number"><em>03</em></span>
                            <h3>Creatie & uitvoering</h3>
                        </div>
                        <div class="flex-col">
                            <div class="step-description">
                                <strong>Strategy. Spark. Scale.</strong>
                                <p>
                                    Van scripting en filmen tot design en development, alles komt tot leven met oog voor detail.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row split step-wrapper">
                        <div class="flex-col">
                            <span class="number"><em>04</em></span>
                            <h3>Publicatie & zichtbaarheid</h3>
                        </div>
                        <div class="flex-col">
                            <div class="step-description">
                                <strong>Zo laat ik merken vlammen</strong>
                                <p>
                                    Ik help je bij het slim verspreiden via de juiste platforms. Met content die niet schreeuwt, maar aanspreekt.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row split step-wrapper">
                        <div class="flex-col">
                            <span class="number"><em>05</em></span>
                            <h3>Optimaliseren & doorpakken</h3>
                        </div>
                        <div class="flex-col">
                            <div class="step-description">
                                <strong>De Ignite Aanpak</strong>
                                <p>
                                    Wat werkt, bouwen we uit. Wat beter kan, verbeteren we. Altijd op basis van resultaat en gevoel.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>

            <section class="section quote-section block-fullwidth single-image playpauze" data-scroll-section>
                <!-- <img class="overlay overlay-media" src="//placehold.co/1920x1080" alt="" data-scroll data-scroll-speed="-1" /> -->
                <video class="overlay overlay-media" autoplay muted loop data-scroll data-scroll-speed="-1"><source src="<?= url('assets/videos/hero-bg-video.mp4') ?>" type="video/mp4"></video>

                <div class="container">
                    <div class="quote">
                        <h3>"Ik ben flexibel in hoe we samenwerken. Full service? Alleen video? Of juist strategie? Jij bepaalt het tempo, ik lever de vlam."</h3>
                        <div class="quote-tag">
                            <span>Damian van der Hoeven</span>
                            <span><em>Ignite One</em></span>
                        </div>
                    </div>
                </div>
            </section>

            <?php snippet('footer') ?>
        </div>
    </main>
</body>
</html>