jQuery(document).ready(function ($) {
  function getScrollBarWidth() {
    var inner = document.createElement("p");
    inner.style.width = "100%";
    inner.style.height = "200px";
    var outer = document.createElement("div");
    outer.style.position = "absolute";
    outer.style.top = "0px";
    outer.style.left = "0px";
    outer.style.visibility = "hidden";
    outer.style.width = "100%";
    outer.style.height = "150px";
    outer.style.overflow = "hidden";
    outer.appendChild(inner);
    document.body.appendChild(outer);
    var w1 = inner.offsetWidth;
    outer.style.overflow = "scroll";
    var w2 = inner.offsetWidth;
    if (w1 == w2) w2 = outer.clientWidth;
    document.body.removeChild(outer);
    return w1 - w2;
  }

  var header = document.querySelector(".header");
  var headroom = new Headroom(header);
  headroom.init();

  $(".btn-menu-open").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      const body = document.body;
      const scrollY = body.style.top;
      $("body").removeAttr("style");
      $(".header").removeClass("nav-opened").removeAttr("style");
      window.scrollTo(0, parseInt(scrollY || "0") * -1);
      $(".main-navigation").removeClass("active");
      $(".btn-menu-open").removeClass("active");
      headroom.unfreeze();
    } else {
      $(this).addClass("active");
      $(".main-navigation").addClass("active");
      const scrollY = $(window).scrollTop();
      $("body").css({ position: "fixed", top: -scrollY, "padding-right": getScrollBarWidth() });
      $(".header").addClass("nav-opened").css({ right: getScrollBarWidth() });
      headroom.freeze();
    }
  });

  $(".btn-menu-close").on("click", function () {
    const body = document.body;
    const scrollY = body.style.top;
    $("body").removeAttr("style");
    $(".header").removeClass("nav-opened").removeAttr("style");
    window.scrollTo(0, parseInt(scrollY || "0") * -1);
    $(".main-navigation").removeClass("active");
    $(".btn-menu-open").removeClass("active");
    headroom.unfreeze();
  });

  $(".main-navigation ul a span")
    .on("mouseenter", function () {
      $(this).parent("a").addClass("hover");
    })
    .on("mouseleave", function () {
      $(this).parent("a").removeClass("hover");
    });

  if ($(".block-03").length) {
    const swiper1 = new Swiper(".swiper-headline", {
      speed: 300,
      spaceBetween: 0,
      allowTouchMove: false,
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
    });
    const swiper2 = new Swiper(".swiper-card", {
      speed: 300,
      spaceBetween: 0,
      allowTouchMove: false,
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
    });
    const swiper3 = new Swiper(".swiper-image", {
      speed: 500,
      spaceBetween: 0,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      on: {
        realIndexChange: function (swiper) {
          swiper1.slideTo(swiper.activeIndex, 300);
          swiper2.slideTo(swiper.activeIndex, 300);
        },
      },
    });

    const swiper4 = new Swiper(".swiper-mobile", {
      speed: 500,
      spaceBetween: 50,
      pagination: {
        el: ".swiper-mobile .swiper-pagination",
        type: "bullets",
        clickable: true,
      },
    });
  }

  if ($(".blog-slider").length) {
    var slides = document.querySelector(".blog-slider").dataset.slides;
    const swiper5 = new Swiper(".blog-slider", {
      speed: 500,
      spaceBetween: 50,
      pagination: {
        el: ".blog-slider .swiper-pagination",
        type: "bullets",
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 28,
        },
        1024: {
          slidesPerView: slides,
          spaceBetween: 28,
          allowTouchMove: false,
        },
      },
    });
  }

  $(".accordion-trigger").on("click", function () {
    if ($(this).parent().hasClass("active")) {
      $(this).parent().removeClass("active").find(".accordion-panel").slideUp(400);
    } else {
      $(".accordion-item.active").removeClass("active").find(".accordion-panel").slideUp(400);
      $(this).parent().addClass("active").find(".accordion-panel").slideDown(400);
    }
  });

  $("#searchCity").on("keyup", function () {
    var searchText = $(this).val().toLowerCase();
    if (searchText !== "") {
      var list = $("#cityList li a");
      list.each(function () {
        var listText = $(this).text().toLowerCase();
        if (listText.indexOf(searchText) === -1) {
          $(this).parent().addClass("hidden");
        } else {
          $(this).parent().removeClass("hidden");
        }
      });
    } else {
      $("#cityList li").removeClass("hidden");
    }
  });

  $(".drop-trigger").on("click", function (e) {
    e.stopPropagation();
    $(this).parent(".dropdown").toggleClass("active");
  });
  $(".drop-list").on("click", function (e) {
    e.stopPropagation();
  });
  $(".drop-list a").on("click", function () {
    $(this).parents(".dropdown").removeClass("active");
  });
  $(document).on("click", function () {
    $(".dropdown").removeClass("active");
  });

  // fade up
  function fadeUp() {
    gsap.utils.toArray(".fade-up, .fade-wrapper > *").forEach(function (elem) {
      ScrollTrigger.create({
        trigger: elem,
        start: "top bottom",
        toggleActions: "play none none none",
        onEnter: function () {
          gsap.to(elem, {
            duration: 1,
            autoAlpha: 1,
            y: 0,
            ease: "none",
            overwrite: "auto",
          });
        },
      });
    });
  }

  $("body").imagesLoaded(function () {
    setTimeout(() => {
      fadeUp();
    }, 1000);
  });

  // dots
  if ($(".block-download").length) {
    gsap.utils.toArray(".block-download .dot").forEach(function (elem) {
      gsap.to(elem, {
        duration: Math.random() * (3 - 0.7) + 0.7,
        autoAlpha: Math.random() * 0.6,
        repeat: -1,
        yoyo: true,
      });
    });
  }

  // circles
  if ($(".stats").length) {
    gsap.to(".block-01 .image", {
      scrollTrigger: {
        trigger: ".stats",
        start: "top 70%",
      },
      duration: 1,
      y: 1,
      opacity: 1,
      ease: "linear",
    });
    gsap.utils.toArray(".stats .circle").forEach(function (elem) {
      var rotate = elem.dataset.rotate;

      gsap.to(elem, {
        scrollTrigger: {
          trigger: ".stats",
          start: "top 70%",
        },
        delay: 1,
        duration: 1,
        rotation: rotate,
        ease: "linear",
      });
      gsap.to(elem.querySelector(".icon"), {
        scrollTrigger: {
          trigger: ".stats",
          start: "top 70%",
        },
        delay: 1,
        duration: 1,
        rotation: rotate * -1,
        opacity: 1,
        ease: "none",
      });
    });
    gsap.to(".stats .number, .stats p", {
      scrollTrigger: {
        trigger: ".stats",
        start: "top 70%",
      },
      duration: 0.5,
      opacity: 1,
      delay: 2,
      ease: "none",
    });
  }
});
