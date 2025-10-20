<?php
/** @var \Kirby\Cms\Block $block */

$location = $block->location()->or('kirby')->value(); // 'kirby' | 'web'
$src      = null;
$poster   = null;

if ($location === 'web') {
  $src = $block->videoUrl()->esc();
} elseif ($file = $block->videoFile()->toFile()) {
  $src = $file->url();
}

if ($p = $block->poster()->toFile()) {
  $poster = $p->url();
}
?>

<?php if ($src): ?>
<section class="section theme-light block-fullwidth single-image playpauze" data-scroll-section>
  <video
    class="overlay overlay-media"
    autoplay
    muted
    loop
    playsinline
    webkit-playsinline
    preload="auto"
    <?php e($poster, 'poster="' . $poster . '"') ?>
    data-scroll
    data-scroll-speed="-3"
  >
    <source src="<?= $src ?>" type="video/mp4">
  </video>
</section>

<script>
  // iOS safeguard: muted forceren en meteen proberen af te spelen
  (function(){
    var v = document.currentScript.previousElementSibling?.querySelector('video');
    if (!v) return;
    v.muted = true;
    v.play && v.play().catch(function(){ /* user gesture fallback */ });
  })();
</script>
<?php endif; ?>
