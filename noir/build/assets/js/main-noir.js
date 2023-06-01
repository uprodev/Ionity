jQuery(document).ready(function ($) {
  var header = document.querySelector(".header");
  if (header) {
    var headroom = new Headroom(header);
    headroom.init();
  }

  var video = document.querySelector(".banner-bg video");
  if (video) {
    video.addEventListener(
      "ended",
      function () {
        $(".banner-bg").fadeOut(200);
        $(".banner-image").fadeIn(200);
        $(".banner-home").addClass("text-shown");
      },
      false
    );
  }

  $(".scroll-down").on("click", function () {
    var dest = $(".block-01");
    $("html, body").animate({ scrollTop: dest.offset().top }, 500);
  });

  let swiper1;
  if ($(".promo-slider").length) {
    swiper1 = new Swiper(".promo-slider", {
      speed: 700,
      spaceBetween: 0,
      navigation: {
        nextEl: ".promo-slider .swiper-btn-next",
        prevEl: ".promo-slider .swiper-btn-prev",
      },
      pagination: {
        el: ".promo-slider .swiper-pagination",
        type: "bullets",
        clickable: true,
      },
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
    });
  }
  $(".promo-image .dot").on("click", function () {
    var slide = parseInt($(this).data("slide"));
    swiper1.slideTo(slide);
  });

  if ($(".product-slider").length) {
    var sliders = document.querySelectorAll(".product-slider");
    sliders.forEach((slider) => {
      const swiper2 = new Swiper(slider, {
        speed: 500,
        spaceBetween: 50,
        pagination: {
          el: slider.querySelector(".swiper-pagination"),
          type: "bullets",
          clickable: true,
        },
        breakpoints: {
          768: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 0,
            allowTouchMove: false,
          },
        },
      });
    });
  }

  $(".tab-nav a").on("click", function (e) {
    e.preventDefault();
    if ($(this).data("tab") === 1) {
      $(".tab-nav").removeClass("moved");
      $(".tabs .wrapper").removeClass("moved");
    } else {
      $(".tab-nav").addClass("moved");
      $(".tabs .wrapper").addClass("moved");
    }
    setTimeout(() => {
      $(".tab-nav a.active").removeClass("active");
      $(this).addClass("active");
    }, 250);
  });

  $(".lang-switch a").on("click", function (e) {
    e.preventDefault();
    $(".lang-switch .active").toggleClass("active");
    $(this).parent().toggleClass("active");
    $(".lang-switch").toggleClass("moved");
  });

  $(".promo-image").on("click", function () {
    if ($(window).width() < 768) {
      $(".promo-slider-wrapper").addClass("active");
    }
  });
  $(".promo-slider-wrapper .button-close").on("click", function () {
    $(".promo-slider-wrapper").removeClass("active");
  });

  $(".product-item .btn-details").on("click", function () {
    var product = $(this).closest(".product-item"),
      details = product.find(".product-details").clone(),
      detailsPopup = $(".details-popup");

    detailsPopup.find(".inner").empty().append(details);
    detailsPopup.addClass("active");
    const scrollY = $(window).scrollTop();
    $("body").css({ position: "fixed", top: -scrollY });
  });
  $(".details-popup .button-close").on("click", function () {
    $(".details-popup").removeClass("active");
    const body = document.body;
    const scrollY = body.style.top;
    $("body").removeAttr("style");
    window.scrollTo(0, parseInt(scrollY || "0") * -1);
  });

  // form
  $.jStyling.createSelect($("select.select"));

  $("select.select").on("change", function () {
    if ($(this).val() !== "" && $(this).val() !== 0) {
      var container = $(this).closest(".jstyling-select");
      container.addClass("selected");
    } else {
      container.removeClass("selected");
    }
  });

  $(".connector-selection input[type=radio]").on("change", function () {
    if ($(this).prop("checked")) {
      var container = $(this).closest(".options-list"),
        selected = $(this).closest(".connector-selection");
      container.find(".connector-selection.active").removeClass("active");
      selected.addClass("active");
    }
  });
  $(".connector-selection input[type=radio]").each(function () {
    if ($(this).prop("checked")) {
      var container = $(this).closest(".options-list"),
        selected = $(this).closest(".connector-selection");
      container.find(".connector-selection.active").removeClass("active");
      selected.addClass("active");
    }
  });

  $(".delivery-selection input").on("change", function () {
    if ($(this).prop("checked")) {
      var type = $(this).val();
      $(".delivery-variant.active").removeClass("active");
      $(".delivery-variant[data-var='" + type + "']").addClass("active");
    }
  });
  $(".delivery-selection input").each(function () {
    if ($(this).prop("checked")) {
      var type = $(this).val();
      $(".delivery-variant.active").removeClass("active");
      $(".delivery-variant[data-var='" + type + "']").addClass("active");
    }
  });

  // $("input[name=method]").on("change", function () {
  //   if ($(this).prop("checked")) {
  //     var type = $(this).val();
  //     $(".delivery-variant.active").removeClass("active");
  //     $(".delivery-variant[data-var=" + type + "]").addClass("active");
  //   }
  // });
  // $("input[name=method]").each(function () {
  //   if ($(this).prop("checked")) {
  //     var type = $(this).val();
  //     $(".delivery-variant.active").removeClass("active");
  //     $(".delivery-variant[data-var=" + type + "]").addClass("active");
  //   }
  // });

  $(".product-number-more").on("click", function () {
    var input = $(this).prev("input");
    console.log(input.val());
    var v = input.val() !== "" ? parseInt(input.val()) : 0;
    input.val(v + 1);
    if (parseInt(input.val()) > 1) {
      $(".product-number-less").removeAttr("disabled");
    } else {
      $(".product-number-less").attr("disabled", true);
    }
  });

  $(".product-number-less").on("click", function () {
    var input = $(this).next("input");
    if (parseInt(input.val()) > 1) {
      input.val(parseInt(input.val()) - 1);
      if (parseInt(input.val()) <= 1) {
        $(".product-number-less").attr("disabled", true);
      }
    } else {
    }
  });
  $(".product-number input").on("input", function () {
    var v = parseInt($(this).val());
    if (v < 0) {
      v = v * -1;
      $(this).val(v);
    }
    if ($(this).val() > 1) {
      $(".product-number-less").removeAttr("disabled");
    } else {
      $(".product-number-less").attr("disabled", true);
    }
  });
});
