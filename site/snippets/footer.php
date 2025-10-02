
<section class="section footer-marquee" data-scroll-section>
    <div class="row">
        <div data-marquee-duplicate="2" data-marquee-scroll-direction-target="" data-marquee-direction="right" data-marquee-status="normal" data-marquee-speed="20" data-marquee-scroll-speed="10" class="marquee">
            <div data-marquee-scroll-target="" class="marquee-inner">
                <div data-marquee-collection-target="" class="marquee-inner-wrap">
                    <div class="marquee-item">
                        <p><em>one spark</em></p>
                        <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                        </svg>
                        <p>infinite possibilities</p>
                        <svg class="arrow" stroke-width="0" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 48H46V6.82812L3.41406 49.4141L0.585938 46.5859L43.1719 4H2V0H50V48Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="footer-wrap" data-scroll-section>
    <div class="footer-inner-wrap">
        <section class="section connect-section" data-scroll data-scroll-speed="-3" data-scroll-position="bottom" data-scroll-offset="-50%, 0%">
            <div class="container">
                <div class="row split">
                    <div class="col">
                        <h2 class="section-title big">Let's<br/><em>connect</em></h2>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><strong>Ignite One</strong></li>
                                    <li>Damian van der Hoeven</li>
                                    <li>Boterbloem 3<br/>2671 WS, Naaldwijk</li>
                                </ul>

                                <div class="button-row">
                                    <a href="" class="btn btn-click">
                                        <div class="btn-fill"></div>
                                        <div class="btn-text">
                                            <span>damian@igniteone.nl</span>
                                            <span class="serif">damian@igniteone.nl</span>
                                        </div>
                                    </a>

                                    <a href="" class="btn btn-click">
                                        <div class="btn-fill"></div>
                                        <div class="btn-text">
                                            <span>+31 6 23 53 32 38</span>
                                            <span class="serif">+31 6 23 53 32 38</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="flex-col">
                                <ul>
                                    <li><a href="" title=""><span>LinkedIn</span></a></li>
                                    <li><a href="" title=""><span>Instagram</span></a></li>
                                    <li><a href="" title=""><span>TikTok</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="stripe"></div>
            </div>
        </section>

        <section class="section footer-cta-section" data-scroll data-scroll-speed="-5" data-scroll-position="bottom" data-scroll-offset="-50%, 0%">
            <div class="container">
                <div class="footer-cta">
                    <div class="project-indicator-wrapper">
                        <span class="project-indicator"></span>
                        <span class="project-indicator-text">Open voor nieuwe projecten</span>
                    </div>
                    <h2>Klaar om te <em>vlammen?</em></h2>
                    <a href="" class="btn btn-click">
                        <div class="btn-fill"></div>
                        <div class="btn-text">
                            <span>damian@igniteone.nl</span>
                            <span class="serif">damian@igniteone.nl</span>
                        </div>
                    </a>
                </div>
                
                <div class="footer-links">
                    <div class="row split">
                        <div class="flex-col">
                            <?php if ($menu = $site->footerMenu()->toStructure()): ?>
                                <ul>
                                <?php foreach ($menu as $item): ?>
                                    <?php
                                        // Bepaal de URL uit het link-veld (page of url)
                                        $pageObj = $item->link()->toPage();
                                        $url     = $pageObj ? $pageObj->url() : $item->link()->toUrl();

                                        // (optioneel) active state als het een page-link is
                                        $isActive = $pageObj && $pageObj->isActive();
                                    ?>
                                    <li<?= $isActive ? ' class="is-active"' : '' ?>>
                                        <a href="<?= esc($url) ?>"<?= $isActive ? ' aria-current="page"' : '' ?>>
                                            <span><?= $item->label()->escape() ?></span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                                </ul>
                            <?php endif ?>
                        </div>
                        <div class="flex-col">
                            Ignite One &copy; <script>document.write(new Date().getFullYear())</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= snippet('scripts') ?>
<?= snippet('seo/schemas') ?>