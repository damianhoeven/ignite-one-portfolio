<ul class="projects-list mouse-pos-list-image-ul">
    <?php foreach ($projects as $project): ?>
        <?php
            $img = $project->pageImage()->toFile();
            $thumb = $img->crop(800);
            $alt = $img ? $img->alt()->or($project->title())->esc() : $project->title()->esc();    
        ?>
        <li>
            <a class="project-list-item mouse-pos-list-image-hover" href="<?= $project->url() ?>">
                <?php if ($img): ?>    
                    <img class="mobile-thumb" src="<?= $thumb->url() ?>" alt="<?= $alt ?>" loading="lazy" decoding="async">
                <?php endif; ?>
                
                <div class="row split">
                    <div class="flex-col">
                        <span><?= $project->title() ?></span>
                    </div>

                    <div class="flex-col">
                        <small><?= $project->year() ?></small>
                        <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                        </svg>
                    </div>
                </div>
            </a>
        </li>
    <?php endforeach ?>
</ul>
