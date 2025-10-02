gsap.registerPlugin(ScrollTrigger);

let scroll;

const body = document.body;
const select = (e) => document.querySelector(e);
const selectAll = (e) => document.querySelectorAll(e);
//const container = select('.site-main');

initPageTransitions();

// Animation - First Page Load
function initLoader() { 

  var tl = gsap.timeline();

	tl.set(".loading-screen", { 
		top: "0",
	});	

  tl.set("h1 .outer-span span", {
    yPercent: 250,
    rotate: 10
  });

  tl.set(".once-in", {
    y: "20vh",
    opacity: 0
  });

    tl.set("html", { 
        cursor: "wait"
    });

  tl.set(".loading-text .span-inner", {
    rotation: 0,
    yPercent: 150,
    opacity: 1
  });

  tl.to(".loading-text .span-inner", {
    duration: 1,
    rotation: 0,
    yPercent: 0,
    ease: "Expo.easeOut",
    delay: .4,
    stagger: .05
  });

  tl.to(".loading-text .span-inner", {
    duration: 1,
    rotation: 0,
    yPercent: -200,
    ease: "Expo.easeIn",
    stagger: -.05
  },"=-.1");

	tl.to(".loading-screen", {
        duration: 1,
        top: "-200%",
        ease: "Power2.easeOut"
    },"=-.4");

  tl.set("html", { 
        cursor: "auto",
    },"=-.2");

  tl.to(".once-in", {
    duration: 1.6,
    y: "0vh",
    opacity: 1,
    ease: "Expo.easeOut",
    stagger: -.075,
    onStart: staggerSpanH1
  },"=-1.2");
  
  function staggerSpanH1() {
    gsap.to("h1 .outer-span span", {
      duration: 1.6,
      yPercent: 0,
      rotate: 0,
      ease: "Expo.easeOut",
      stagger: -.075,
      delay: .075
    });
  }

  if(document.querySelector("#awwwards")) { 
    tl.to("#awwwards", {
      duration: 1.6,
      xPercent: -100,
      ease: "Expo.easeInOut",
    },"=-2");
  }

}

// Animation - First Page Load
function initLoaderShort() { 

  var tl = gsap.timeline();

	tl.set(".loading-screen", { 
		top: "0",
	});	

  tl.set("h1 .outer-span span", {
		yPercent: 250,
    rotate: 10
  });

  tl.set(".once-in", {
		y: "20vh",
    opacity: 0
  });

  tl.set("html", { 
		cursor: "wait"
	});

  tl.set(".gh-logo .gh-logo-wrapper", {
    rotation: 10,
  });

  tl.to(".gh-logo .gh-logo-wrapper", {
		duration: 1.4,
    rotation: 0,
		ease: "Power4.easeOut",
    delay: .4
  });

  tl.to(".gh-logo .gh-logo-wrapper svg", {
		duration: 1.4,
		y: 0,
    rotation: 0,
		ease: "Power4.easeOut"
	},"=-1.4");

  tl.to(".gh-logo .gh-logo-wrapper svg", {
		duration: .6,
		y: -200,
    rotation: -10,
		ease: "Power4.easeIn",
	},"=-.4");

	tl.to(".loading-screen", {
		duration: .6,
		top: "-200%",
		ease: "Power2.easeOut"
  });

  tl.set("html", { 
		cursor: "auto",
	},"=-.2");

  tl.to(".once-in", {
    duration: 1.6,
    y: "0vh",
    opacity: 1,
    ease: "Power4.easeOut",
    stagger: -.075,
    onStart: staggerSpanH1
  },"=-.8");
  
  function staggerSpanH1() {
    gsap.to("h1 .outer-span span", {
      duration: 1.6,
      yPercent: 0,
      rotate: 0,
      ease: "Power4.easeOut",
      stagger: -.075,
      delay: .075
    });
  }

}

// Wrap alle H1's binnen root (default: document) op <br> tot .outer-span > span
function wrapH1Lines(root = document) {
  const headings = Array.from(root.querySelectorAll('h1'))
    // sla H1's over die al gesplit zijn
    .filter(h => !h.querySelector('.outer-span'));

  headings.forEach(h1 => {
    const segments = [];
    let buf = [];

    // splits op echte <br> nodes (en evt. newline-tekst)
    h1.childNodes.forEach(node => {
      if (node.nodeType === 1 && node.tagName === 'BR') {
        segments.push(buf); buf = [];
      } else if (node.nodeType === 3 && /\n/.test(node.nodeValue)) {
        // als iemand <h1>…\n…</h1> zou genereren
        const parts = node.nodeValue.split(/\n/);
        parts.forEach((p, i) => {
          if (p) buf.push(document.createTextNode(p));
          if (i < parts.length - 1) { segments.push(buf); buf = []; }
        });
      } else {
        buf.push(node);
      }
    });
    if (buf.length) segments.push(buf);

    // helper: trim leading/trailing whitespace textnodes
    const trim = nodes => {
      let start = 0, end = nodes.length;
      while (start < end && nodes[start].nodeType === 3 && !nodes[start].nodeValue.trim()) start++;
      while (end > start && nodes[end - 1].nodeType === 3 && !nodes[end - 1].nodeValue.trim()) end--;
      return nodes.slice(start, end);
    };

    const frag = document.createDocumentFragment();

    segments.forEach(nodes => {
      const clean = trim(nodes);
      if (!clean.length) return;

      const outer = document.createElement('span');
      outer.className = 'outer-span';
      const inner = document.createElement('span');

      // move nodes (behoudt <em> etc.)
      clean.forEach(n => inner.appendChild(n));
      outer.appendChild(inner);
      frag.appendChild(outer);
    });

    // vervang de originele inhoud
    h1.replaceChildren(frag);
  });
}

// Animation - Page transition In
function pageTransitionIn() {
  var tl = gsap.timeline();

  tl.call(() => scroll && scroll.stop());
  tl.set(".loading-screen", { top: "200%" });
  tl.set("html", { cursor: "wait" });

  tl.to(".loading-screen", { duration: .8, top: "0%", ease: "Power2.easeIn" })
    .to(".loading-screen", { duration: .8, top: "-200%", ease: "Power2.easeOut", delay: .2 })
    .set("html", { cursor: "auto" })
    .set(".loading-screen", { top: "200%" });
}


// Animation - Page transition Out
function pageTransitionOut(container) {
  const cleanup = gsap.context(() => {
    const onceIns = gsap.utils.toArray('.once-in');
    const h1Spans = gsap.utils.toArray('h1 .outer-span span');

    // schoon begin (voorkomt “al klaar” bij terugnavigeren)
    gsap.killTweensOf([...onceIns, ...h1Spans]);
    gsap.set([...onceIns, ...h1Spans], { clearProps: "all" });

    // beginstates
    gsap.set(onceIns, { y: "20vh", opacity: 0 });
    gsap.set(h1Spans, { yPercent: 250, rotate: 10 });

    const tl = gsap.timeline({ defaults: { ease: "Expo.easeOut", duration: 1.6 } });
    tl.call(() => scroll && scroll.start(), null, 0);

    tl.to(onceIns,  { y: "0vh", opacity: 1, stagger: -0.075 }, 0)
      .to(h1Spans,  { yPercent: 0, rotate: 0, stagger: -0.075, delay: .075 }, 0);
  }, container);

  return () => cleanup.revert();
}

function initPageTransitions() {

  //let scroll;

  // do something before the transition starts
  barba.hooks.before(() => {
    select('html').classList.add('is-transitioning');
  });

  barba.hooks.after(() => {
    select('html').classList.remove('is-transitioning');
  });

  barba.hooks.afterEnter(() => { window.scrollTo(0, 0); });

  barba.init({
    sync: true,
    debug: false,
    timeout: 7000,
    transitions: [{
      name: 'default',
      once(data) {
        wrapH1Lines(data.next.container);
        initSmoothScroll(data.next.container);
        initScript();
        initLoader();
      },
      async leave(data) {
        pageTransitionIn();
        await delay(795);
        data.current.container.remove();
      },
      async beforeEnter(data) {
        ScrollTrigger.getAll().forEach(t => t.kill());
        if (scroll) scroll.destroy();
        wrapH1Lines(data.next.container);
        initSmoothScroll(data.next.container);
        initScript();
        ScrollTrigger.refresh(true);
      },
      async enter(data) {
        document.fonts.ready.then(() => pageTransitionOut(data.next.container));
      }
    }]
  });

  function initSmoothScroll(container) {
    const scrollerEl = container.querySelector('[data-scroll-container]');

    scroll = new LocomotiveScroll({
      el: scrollerEl,
      smooth: true,
      lerp: 0.075,
    });

    window.addEventListener('resize', () => scroll.update());
    scroll.on("scroll", () => ScrollTrigger.update());

    ScrollTrigger.scrollerProxy(scrollerEl, {
      scrollTop(value) {
        return arguments.length
          ? scroll.scrollTo(value, { duration: 0, disableLerp: true })
          : scroll.scroll.instance.scroll.y;
      },
      getBoundingClientRect() {
        return { top: 0, left: 0, width: window.innerWidth, height: window.innerHeight };
      },
      pinType: scrollerEl.style.transform ? "transform" : "fixed"
    });

    ScrollTrigger.defaults({ scroller: scrollerEl });

    // dubbele scrollbar opruimen (na nieuwe init)
    const bars = document.querySelectorAll('.c-scrollbar');
    if (bars.length > 1) bars[0].remove();

    ScrollTrigger.addEventListener('refresh', () => scroll.update());
    ScrollTrigger.refresh();
  }
}

function delay(n) {
	n = n || 2000;
	return new Promise((done) => {
		setTimeout(() => {
			done();
		}, n);
	});
}

/**
 * Fire all scripts on page load
 */
function initScript() {
  // select('body').classList.remove('is-loading');
  // initWindowInnerheight();
  // initCheckTouchDevice();
  initBtnMenuOpenClose();
  // initLazyLoad();
  initPlayVideoInview();
  initMarqueeScrollDirection();
  initScrolltriggerCheckScroll();
  // initTimeZone();
  // initStickyCursorWithDelay();
  // initDataBackground();
  // initVimeoPlayPauze();
  initScrollToLoco();
  initScrolltriggerAnimations();
}

/**
* Window Inner Height Check
*/
function initWindowInnerheight() {
    
  // https://css-tricks.com/the-trick-to-viewport-units-on-mobile/
  $(document).ready(function(){
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
  });

}

/**
* Check touch device
*/
function initCheckTouchDevice() {
    
  function isTouchScreendevice() {
    return 'ontouchstart' in window || navigator.maxTouchPoints;      
  };
  
  if(isTouchScreendevice()){
    $('main').addClass('touch');
    $('main').removeClass('no-touch');
  } else {
    $('main').removeClass('touch');
    $('main').addClass('no-touch');
  }
  $(window).resize(function() {
    if(isTouchScreendevice()){
       $('main').addClass('touch');
       $('main').removeClass('no-touch');
    } else {
       $('main').removeClass('touch');
       $('main').addClass('no-touch');
    }
  });

}


/**
* Hamburger Nav Open/Close
*/
function initBtnMenuOpenClose() {
    
  // Open/close navigation when clicked .btn-hamburger

  $(document).ready(function(){
    $(".nav-btn").click(function(){
      if ($(".nav-btn").hasClass('active')) {
          $(".nav-btn").removeClass('active');
          $("main").removeClass('nav-active');
          scroll.start();
      } else {
          $(".nav-btn").addClass('active');
          $("main").addClass('nav-active');
          scroll.stop();
      }
    });
    $('.fixed-nav-back').click(function(){
      $(".nav-btn").removeClass('active');
      $("main").removeClass('nav-active');
      scroll.start();
    });
  });
  $(document).keydown(function(e){
    if(e.keyCode == 27) {
      if ($('main').hasClass('nav-active')) {
          $(".nav-btn").removeClass('active');
          $("main").removeClass('nav-active');
          scroll.start();
      } 
    }
  });
}

/**
* Lazy Load
*/
function initLazyLoad() {
    // https://github.com/locomotivemtl/locomotive-scroll/issues/225
    // https://github.com/verlok/vanilla-lazyload
    var lazyLoadInstance = new LazyLoad({ 
      elements_selector: ".lazy",
    });
}

/**
* Play Video Inview
*/
function initPlayVideoInview() {

  let allVideoDivs = gsap.utils.toArray('.playpauze');

  allVideoDivs.forEach((videoDiv, i) => {

    let videoElem = videoDiv.querySelector('video')

    ScrollTrigger.create({
      scroller: document.querySelector('[data-scroll-container]'),
      trigger: videoElem,
      start: '0% 120%',
      end: '100% -20%',
      onEnter: () => videoElem.play(),
      onEnterBack: () => videoElem.play(),
      onLeave: () => videoElem.pause(),
      onLeaveBack: () => videoElem.pause(),
    });

  });
}

/**
* Scrolltrigger Scroll Check
*/
function initScrolltriggerCheckScroll() {
    
  ScrollTrigger.create({
    start: 'top -20%',
    onUpdate: self => {
      $("main").addClass('scrolled');
    },
    onLeaveBack: () => {
      $("main").removeClass('scrolled');
    },
  });
}

/**
* Time Zone
*/
function initTimeZone() {
    
  // Time zone
  // https://stackoverflow.com/questions/39418405/making-a-live-clock-in-javascript/67149791#67149791
  // https://stackoverflow.com/questions/8207655/get-time-of-specific-timezone
  // https://stackoverflow.com/questions/63572780/how-to-update-intl-datetimeformat-with-new-date

  var timeSpanHeader = document.querySelector("#timeSpanHeader");
  var timeSpanFooter = document.querySelector("#timeSpanFooter");

  const optionsTime = {
    timeZone: 'Europe/Amsterdam',
    timeZoneName: 'short',
    // year: 'numeric',
    // month: 'numeric',
    // day: 'numeric',
    hour: '2-digit',
    hour24: 'true',
    minute: 'numeric',
    second: 'numeric',
  };

  const formatter = new Intl.DateTimeFormat([], optionsTime);
  updateTime();
  setInterval(updateTime, 1000);


  function updateTime() {
      const dateTime = new Date();
      const formattedDateTime = formatter.format(dateTime);
      if (timeSpanHeader) {
        timeSpanHeader.textContent = formattedDateTime;
      }
      if (timeSpanFooter) {
        timeSpanFooter.textContent = formattedDateTime;
      }
  }

}

/**
* Sticky Cursor with Delay
*/
function initStickyCursorWithDelay() {
    
  // Sticky Cursor with delay
  // https://greensock.com/forums/topic/21161-animated-mouse-cursor/

  var posXBtn = 0
  var posYBtn = 0
  var posXImage = 0
  var posYImage = 0
  var mouseX = 0
  var mouseY = 0

  if(document.querySelector(".custom-cursor, .mouse-pos-list-image")) {
  gsap.to({}, 0.0083333333, {
    repeat: -1,
    onRepeat: function() {

      if(document.querySelector(".custom-cursor")) {
        posXBtn += (mouseX - posXBtn) / 6;
        posYBtn += (mouseY - posYBtn) / 6;
        gsap.set($(".custom-cursor"), {
          css: {
          left: posXBtn,
          top: posYBtn
          }
        });
        gsap.set($(".custom-cursor .rotate-cursor"), {
          css: {
          rotate: (mouseX - posXBtn) / 3
          }
        });
      }
      if(document.querySelector(".mouse-pos-list-image")) {
        posXImage += ((mouseX / 4) - posXImage) / 6;
        posYImage += (mouseY - posYImage) / 6;
        gsap.set($(".mouse-pos-list-image"), {
          css: {
          left: posXImage,
          top: posYImage
          }
        });
      }
    }
  });
  }

  $(document).on("mousemove", function(e) {
    mouseX = e.clientX;
    mouseY = e.clientY;
  });

  // Mouse Init
  $('main').on('mousemove', function() {
    if ($(".custom-cursor").hasClass('cursor-init')) {
    } else {
    $(".custom-cursor").addClass('cursor-init');
    }
  });

  // Link Hover
  $('a').on('mouseenter', function() {
    $('.custom-cursor').addClass('cursor-hover');
  });
  $('a').on('mouseleave', function() {
    $('.custom-cursor').removeClass('cursor-hover');
  });

  // Pressed
  $('main').on('mousedown', function() {
    $(".custom-cursor").addClass('pressed');
  });
  $('main').on('mouseup', function() {
    $(".custom-cursor").removeClass('pressed');
  });

  // Work Case Hover
  $('a.single-work').on('mouseenter', function() {
    $('.custom-cursor').addClass('cursor-work');
  });
  $('a.single-work').on('mouseleave', function() {
    $('.custom-cursor').removeClass('cursor-work');
  });

  // Archive Preview Hover
  $('.lab-preview').on('mouseenter', function() {
    $('.custom-cursor').addClass('cursor-lab');
  });
  $('.lab-preview').on('mouseleave', function() {
    $('.custom-cursor').removeClass('cursor-lab');
  });

  // Home Header Rotate
  $('.hero-scroll-animation').on('mousemove', function() {
    if ($(".custom-cursor").hasClass('cursor-tiles')) {
    } else {
    $(".custom-cursor").addClass('cursor-tiles');
    }
  });
  $('.hero-scroll-animation').on('mouseleave', function() {
    $('.custom-cursor').removeClass('cursor-tiles');
  });

  // Service + Collective Image
  $('.mouse-pos-list-image-hover').on('mouseenter', function() {
    $('.mouse-pos-list-image').addClass('active');
  });
  $('.mouse-pos-list-image-hover').on('mouseleave', function() {
    $('.mouse-pos-list-image').removeClass('active');
  });

  $('.mouse-pos-list-image-ul li').on('mouseenter mouseleave', function() {
    var index =  $(this).index();
    $(".mouse-pos-list-image-ul, .mouse-pos-list-image").each(function() {
      $("li",this).eq(index).siblings().removeClass("active");
      $("li",this).eq(index).addClass("active");
    });
  });

  $('.collective-ul li').on('mouseenter', function() {
    $('.fixed-cursor-wrap').addClass('inactive');
  });
  $('.collective-ul li').on('mouseleave', function() {
    $('.fixed-cursor-wrap').removeClass('inactive');
  });

  // Single Vimeo
  $('.video-hover').on('mouseenter', function() {
    $(".custom-cursor").addClass('cursor-video');
  });
  $('.video-hover').on('mouseleave', function() {
    $(".custom-cursor").removeClass('cursor-video');
  });
  $('.video-hover .vimeo-control-play').on('mouseenter', function() {
    $(".custom-cursor").addClass('cursor-video-play');
    $(".custom-cursor").removeClass('cursor-video-pause');
  });
  $('.video-hover .vimeo-control-pause').on('mouseenter', function() {
    $(".custom-cursor").addClass('cursor-video-pause');
    $(".custom-cursor").removeClass('cursor-video-play');
  });
  
}

/**
* Dark/Light check data-background-color
*/
// https://codepen.io/akapowl/pen/vYyaYrN/9c4d4d9fbb9a34547789139a21216509

function initDataBackground() {

  const sectionsDark = gsap.utils.toArray('.theme-dark');
  sectionsDark.forEach(sectionDark => {
    
    ScrollTrigger.create({
      trigger: sectionDark,
      start: '20% 20%',
      end: '100% 20%',
      onEnter: () => functionAddDark(),
      onEnterBack: () => functionAddDark(),
      markers: false,
    });
    function functionAddDark() {
      if ($("main").hasClass('theme-nav-dark')) {
      } else {
        $("main").removeClass('theme-nav-light');
        $("main").addClass('theme-nav-dark');
      }
    };
  });

  const sectionsLight = gsap.utils.toArray('.theme-light');
  sectionsLight.forEach(sectionLight => {
    
    ScrollTrigger.create({
      trigger: sectionLight,
      start: '0% 20%',
      end: '100% 0%',
      onEnter: () => functionAddLight(),
      onEnterBack: () => functionAddLight(),
      markers: false,
    });
    function functionAddLight() {
      if ($("main").hasClass('theme-nav-light')) {
      } else {
      $("main").removeClass('theme-nav-dark');
      $("main").addClass('theme-nav-light');
      }
    };
  });

}

// Marque
function initMarqueeScrollDirection() {
    document.querySelectorAll('[data-marquee-scroll-direction-target]').forEach((marquee) => {
        // Query marquee elements
        const marqueeContent = marquee.querySelector('[data-marquee-collection-target]');
        const marqueeScroll = marquee.querySelector('[data-marquee-scroll-target]');
        if (!marqueeContent || !marqueeScroll) return;

        // Get data attributes
        const { marqueeSpeed: speed, marqueeDirection: direction, marqueeDuplicate: duplicate, marqueeScrollSpeed: scrollSpeed } = marquee.dataset;

        // Convert data attributes to usable types
        const marqueeSpeedAttr = parseFloat(speed);
        const marqueeDirectionAttr = direction === 'right' ? 1 : -1; // 1 for right, -1 for left
        const duplicateAmount = parseInt(duplicate || 0);
        const scrollSpeedAttr = parseFloat(scrollSpeed);
        const speedMultiplier = window.innerWidth < 479 ? 0.25 : window.innerWidth < 991 ? 0.5 : 1;

        let marqueeSpeed = marqueeSpeedAttr * (marqueeContent.offsetWidth / window.innerWidth) * speedMultiplier;

        // Precompute styles for the scroll container
        marqueeScroll.style.marginLeft = `${scrollSpeedAttr * -1}%`;
        marqueeScroll.style.width = `${(scrollSpeedAttr * 2) + 100}%`;

        // Duplicate marquee content
        if (duplicateAmount > 0) {
        const fragment = document.createDocumentFragment();
        for (let i = 0; i < duplicateAmount; i++) {
            fragment.appendChild(marqueeContent.cloneNode(true));
        }
        marqueeScroll.appendChild(fragment);
        }

        // GSAP animation for marquee content
        const marqueeItems = marquee.querySelectorAll('[data-marquee-collection-target]');
        const animation = gsap.to(marqueeItems, {
        xPercent: -100, // Move completely out of view
        repeat: -1,
        duration: marqueeSpeed,
        ease: 'linear'
        }).totalProgress(0.5);

        // Initialize marquee in the correct direction
        gsap.set(marqueeItems, { xPercent: marqueeDirectionAttr === 1 ? 100 : -100 });
        animation.timeScale(marqueeDirectionAttr); // Set correct direction
        animation.play(); // Start animation immediately

        // Set initial marquee status
        marquee.setAttribute('data-marquee-status', 'normal');

        // ScrollTrigger logic for direction inversion
        ScrollTrigger.create({
        trigger: marquee,
        start: 'top bottom',
        end: 'bottom top',
        onUpdate: (self) => {
            const isInverted = self.direction === 1; // Scrolling down
            const currentDirection = isInverted ? -marqueeDirectionAttr : marqueeDirectionAttr;

            // Update animation direction and marquee status
            animation.timeScale(currentDirection);
            marquee.setAttribute('data-marquee-status', isInverted ? 'normal' : 'inverted');
        }
        });

        // Extra speed effect on scroll
        const tl = gsap.timeline({
        scrollTrigger: {
            trigger: marquee,
            start: '0% 100%',
            end: '100% 0%',
            scrub: 0
        }
        });

        const scrollStart = marqueeDirectionAttr === -1 ? scrollSpeedAttr : -scrollSpeedAttr;
        const scrollEnd = -scrollStart;

        tl.fromTo(marqueeScroll, { x: `${scrollStart}vw` }, { x: `${scrollEnd}vw`, ease: 'none' });
    });
}

/**
* Vimeo Video Play/Pauze
*/
function initVimeoPlayPauze() {

  // Full controls
  // https://codepen.io/simpson77/pen/YXowmy
  
  $('.single-vimeo-target').each(function(index){

    var playerID = $(this);

    var videoIndexID = 'vimeo-control-' + index;
    $(this).attr('id', videoIndexID);

    var iframe = $(this).attr('id')
    var player = new Vimeo.Player(iframe);

    player.setColor('#FF0033');
    player.setVolume(1);

    // Loaded
    player.on('play', function() {
      playerID.addClass('vimeo-status-loaded');
    });

    // Play
    playerID.find(".vimeo-control-play").click(function(){
      playerID.addClass('vimeo-status-active');
      playerID.addClass('vimeo-status-play');
      player.play();
    });

    // Pause
    playerID.find(".vimeo-control-pause").click(function(){
      playerID.removeClass('vimeo-status-play');
      player.pause();
    });

    // Mute
    playerID.find(".vimeo-control-mute").click(function(){
      if (playerID.hasClass('vimeo-status-muted')) {
        player.setVolume(1);
        playerID.removeClass('vimeo-status-muted');
      } else {
        player.setVolume(0);
        playerID.addClass('vimeo-status-muted');
      }
    });

    // Convert number into seconds & hrs
    // https://stackoverflow.com/questions/11792726/turn-seconds-into-hms-format-using-jquery
    function secondsTimeSpanToHMS(s) {
      var h = Math.floor(s / 3600); //Get whole hours
      s -= h * 3600;
      var m = Math.floor(s / 60); //Get remaining minutes
      s -= m * 60;
      return (m) + ":" + (s < 10 ? '0' + s : s); //zero padding on minutes and seconds
    }

    // Progress Time
    var vimeoStatus = $('.time');
    player.on('timeupdate', function(data) {
      vimeoStatus.text(secondsTimeSpanToHMS(Math.trunc(data.seconds)));
    });

    // Duration

    var vimeoDuration = $('.duration');
    player.getDuration().then(function(duration) {
      vimeoDuration.text(secondsTimeSpanToHMS(duration));
    }).catch(function(error) {
        // an error occurred
    });

    // Ended
    var onEnd = function() {
      playerID.removeClass('vimeo-status-active');
      playerID.removeClass('vimeo-status-play');
      player.unload();
    };
    player.on('ended', onEnd);
      
  });
}

/**
 * ScrollTo Anchor Links
 */
 function initScrollToLoco() {
	$("[data-target]").click(function() {
		let target = $(this).data('target');
		scroll.scrollTo(target,{
			'duration': 1200,
			'easing':[0.7, 0, 0.1, 1],
			'disableLerp': false
		});
	});
}
/**
* Scrolltrigger Animations Desktop + Mobile
*/
function initScrolltriggerAnimations() {
    
  // Disable GSAP on Mobile
  // Source: https://greensock.com/forums/topic/26325-disabling-scrolltrigger-on-mobile-with-mediamatch/
  ScrollTrigger.matchMedia({
    
    // Desktop Only Scrolltrigger 
    "(min-width: 1025px)": function() {

      if(document.querySelector(".hero-scroll-animation")) {
        // Scrolltrigger Animation : Example
        $(".hero-scroll-animation").each(function (index) {
          let triggerElement = $(this);
          let targetElement = $(this);
        
          let tl = gsap.timeline({
            scrollTrigger: {
              trigger: triggerElement,
              start: "100% 100%",
              end: "150% 0%",
              markers: false,
              scrub: 0
            }
          });
          tl.to(targetElement, {
            opacity: 0,
            ease: "Power3.easeOut"
          });
        });
      }
    
    }, // End Desktop Only Scrolltrigger
  
    // Mobile Only Scrolltrigger
    "(max-width: 1024px)": function() {

      if(document.querySelector(".hero-scroll-animation")) {
        // Scrolltrigger Animation : Example
        $(".hero-scroll-animation").each(function (index) {
          let triggerElement = $(this);
          let targetElement = $(this);
        
          let tl = gsap.timeline({
            scrollTrigger: {
              trigger: triggerElement,
              start: "0% 100%",
              end: "100% 0%",
              scrub: 0
            }
          });
          tl.to(targetElement, {
            opacity: 0,
            ease: "none"
          });
        });
      }
    } // End Mobile Only Scrolltrigger

  }); // End GSAP Matchmedia
}
