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
                <div class="section about-intro-section theme-light once-in">
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
                                <img data-scroll data-scroll-speed="1" src="<?= url('assets/img/damian.jpg') ?>" alt="" />
                            </div>
                            <div class="flex-col">
                                <div class="text w-650">
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

                <div class="section help-section w-border theme-light">
                    <div class="container">
                        <div class="row split third">
                            <div class="col">
                                <h2 class="section-title">
                                    Waar ik je bij<br/>
                                    kan <em>helpen</em>
                                </h2>
                            </div>
                            <div class="col">
                                <div class="row split help-step-wrapper">
                                    <div class="flex-col">
                                        <span class="number"><em>01</em></span>
                                        <h3>Branding</h3>
                                    </div>
                                    <div class="flex-col">
                                        <p>
                                            Een merk is meer dan een logo. Ik help je om een duidelijke identiteit en verhaal neer te zetten dat écht bij jou past.
                                        </p>
                                    </div>
                                </div>

                                <div class="row split help-step-wrapper">
                                    <div class="flex-col">
                                        <span class="number"><em>02</em></span>
                                        <h3>Videografie</h3>
                                    </div>
                                    <div class="flex-col">
                                        <p>
                                            Met video maak je impact. Ik breng jouw verhaal visueel tot leven, zodat het blijft hangen bij je doelgroep.
                                        </p>
                                    </div>
                                </div>

                                <div class="row split help-step-wrapper">
                                    <div class="flex-col">
                                        <span class="number"><em>03</em></span>
                                        <h3>Website design &<br/>ontwikkeling</h3>
                                    </div>
                                    <div class="flex-col">
                                        <p>
                                            Van strak design tot een goed werkende website, ik zorg dat jouw online plek er niet alleen goed uitziet, maar ook resultaat oplevert.
                                        </p>
                                    </div>
                                </div>

                                <div class="row split help-step-wrapper">
                                    <div class="flex-col">
                                        <span class="number"><em>04</em></span>
                                        <h3>Social media content &<br/>strategie</h3>
                                    </div>
                                    <div class="flex-col">
                                        <p>
                                            Slimme strategie en creatieve content die jouw merk zichtbaar maakt en consistent laat groeien op social media.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="section help-section theme-light">
                    <div class="container">
                        <div class="row split third">
                            <div class="col">
                                <h2 class="section-title">
                                    Veelgestelde</br><em>vragen</em>
                                </h2>
                            </div>
                            <div class="col">
                                <div class="accordion">
                                    <details>
                                        <summary>
                                            <div class="title-row">
                                                <span class="accordion-number"><em>01</em></span>
                                                <h3>Hoe ziet een samenwerking eruit?</h3>
                                            </div>
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.9707 10.8955V12.8955H0.970703V10.8955H24.9707Z" />
                                                <path d="M12.0752 0H14.0752L14.0752 24H12.0752L12.0752 0Z" />
                                            </svg>
                                        </summary>
                                        <p>
                                            Heel persoonlijk. We beginnen altijd met een gesprek om te ontdekken wat je nodig hebt en waar je merk voor staat. Van daaruit maken we een plan dat bij jou past, geen standaard traject, maar maatwerk.
                                        </p>
                                    </details>
                                </div>
                                <div class="accordion">
                                    <details>
                                        <summary>
                                            <div class="title-row">
                                                <span class="accordion-number"><em>02</em></span>
                                                <h3>Kan ik ook alleen voor één dienst bij je terecht?</h3>
                                                <!-- <small><em>(bijv. alleen video of alleen website)</em></small> -->
                                            </div>
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.9707 10.8955V12.8955H0.970703V10.8955H24.9707Z" />
                                                <path d="M12.0752 0H14.0752L14.0752 24H12.0752L12.0752 0Z" />
                                            </svg>
                                        </summary>
                                        <p>
                                            Zeker! Je kunt kiezen voor een compleet traject of alleen datgene waar je nu behoefte aan hebt. Of het nu gaat om een losse video, een nieuwe website of alleen branding, het kan allemaal.
                                        </p>
                                    </details>
                                </div>
                                <div class="accordion">
                                    <details>
                                        <summary>
                                            <div class="title-row">
                                                <span class="accordion-number"><em>03</em></span>
                                                <h3>Werk je met vaste prijzen of maatwerk?</h3>
                                            </div>
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.9707 10.8955V12.8955H0.970703V10.8955H24.9707Z" />
                                                <path d="M12.0752 0H14.0752L14.0752 24H12.0752L12.0752 0Z" />
                                            </svg>
                                        </summary>
                                        <p>
                                            Ik werk vooral met maatwerk, omdat ieder merk en project uniek is. Tijdens ons eerste gesprek bespreken we jouw wensen en maak ik een duidelijk voorstel, zodat je precies weet waar je aan toe bent.
                                        </p>
                                    </details>
                                </div>
                                <div class="accordion">
                                    <details>
                                        <summary>
                                            <div class="title-row">
                                                <span class="accordion-number"><em>04</em></span>
                                                <h3>Hoe lang duurt het gemiddeld om een project te realiseren?</h3>
                                            </div>
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M24.9707 10.8955V12.8955H0.970703V10.8955H24.9707Z" />
                                                <path d="M12.0752 0H14.0752L14.0752 24H12.0752L12.0752 0Z" />
                                            </svg>
                                        </summary>
                                        <p>
                                            Dat hangt af van het type project. Een video kan vaak in enkele weken afgerond worden, terwijl een website of volledige branding wat meer tijd vraagt. Gemiddeld varieert het van 3 tot 8 weken, afhankelijk van de omvang en jouw planning.
                                        </p>
                                    </details>
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

