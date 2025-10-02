<?php
/**
 * @var \Kirby\Cms\Site $site
 * @var \Kirby\Cms\Page $page
 */
?>

<?php snippet('head') ?>
<body data-barba="wrapper">
    <?php snippet('loading-screen') ?>

    <main class="main" data-barba="container" data-barba-namespace="projects">
        <?php snippet('navigation') ?>
        
        <div class="main-wrap" data-scroll-container>
            <section class="section hero-section" data-scroll-section>
                <div class="container">
                    <h1><?= $page->Herotitle()->kirbytextinline() ?></h1>
                </div>
            </section>

            <section class="section projects-overview-section" data-scroll-section>
                <div class="container once-in">
                    <ul class="projects-list mouse-pos-list-image-hover">
                    <li class="projects-header">
                        <div class="row-grid">
                            <span class="col-label">Project / Klant</span>
                            <span class="col-label">Services</span>
                            <span class="col-label">Jaar</span>
                            <span class="col-label"></span>
                        </div>
                    </li>

                    <?php foreach (collection('projects')->sortBy('year', 'desc', 'title', 'asc') as $project): ?>
                        <li class="project-row">
                            <a class="project-list-item" href="<?= $project->url() ?>">
                                <div class="row-grid">                          
                                    <h2><?= $project->title() ?></h2>
                                    
                                    <?php if ($project->services()->isNotEmpty()): ?>
                                        <ul class="services">
                                            <?php foreach ($project->services()->split() as $service): ?>
                                                <li><?= esc($service) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    <?php endif; ?>

                                    <small class="year"><?= $project->year() ?></small>

                                    <svg class="arrow" viewBox="0 0 50 50" aria-hidden="true">
                                        <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                                    </svg>
                                </div>
                            </a>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </section>

            <?php snippet('footer') ?>
        </div>
    </main>
</body>
</html>

