jQuery(document).ready((function (e) {
  var t = document.querySelector(".header");
  t && new Headroom(t).init();
  var a = document.querySelector(".banner-bg video");
  let o;
  (a && a.addEventListener("ended", (function () {
    e(".banner-bg").fadeOut(200), e(".banner-home").addClass("text-shown")
  }), !1), e(".scroll-down").on("click", (function () {
    var t = e(".block-01");
    e("html, body").animate({scrollTop: t.offset().top}, 500)
  })), e(".promo-slider").length && (o = new Swiper(".promo-slider", {
    speed: 700,
    spaceBetween: 0,
    navigation: {nextEl: ".promo-slider .swiper-btn-next", prevEl: ".promo-slider .swiper-btn-prev"},
    pagination: {el: ".promo-slider .swiper-pagination", type: "bullets", clickable: !0},
    effect: "fade",
    fadeEffect: {crossFade: !0}
  })), e(".promo-image .dot").on("click", (function () {
    var t = parseInt(e(this).data("slide"));
    o.slideTo(t)
  })), e(".product-slider").length) && document.querySelectorAll(".product-slider").forEach(e => {
    new Swiper(e, {
      speed: 500,
      spaceBetween: 50,
      pagination: {el: e.querySelector(".swiper-pagination"), type: "bullets", clickable: !0},
      breakpoints: {
        768: {slidesPerView: 2, spaceBetween: 0},
        1024: {slidesPerView: 4, spaceBetween: 0, allowTouchMove: !1}
      }
    })
  });
  e(".tab-nav a").on("click", (function (t) {
    t.preventDefault(), 1 === e(this).data("tab") ? (e(".tab-nav").removeClass("moved"), e(".tabs .wrapper").removeClass("moved")) : (e(".tab-nav").addClass("moved"), e(".tabs .wrapper").addClass("moved")), setTimeout(() => {
      e(".tab-nav a.active").removeClass("active"), e(this).addClass("active")
    }, 250)
  })), e(".lang-switch a").on("click", (function (t) {
    t.preventDefault(), e(".lang-switch .active").toggleClass("active"), e(this).parent().toggleClass("active"), e(".lang-switch").toggleClass("moved")
  })), e(".promo-image").on("click", (function () {
    e(window).width() < 768 && e(".promo-slider-wrapper").addClass("active")
  })), e(".promo-slider-wrapper .button-close").on("click", (function () {
    e(".promo-slider-wrapper").removeClass("active")
  })), e(".product-item .btn-details").on("click", (function () {
    var t = e(this).closest(".product-item").find(".product-details").clone(), a = e(".details-popup");
    a.find(".inner").empty().append(t), a.addClass("active");
    const o = e(window).scrollTop();
    e("body").css({position: "fixed", top: -o})
  })), e(".details-popup .button-close").on("click", (function () {
    e(".details-popup").removeClass("active");
    const t = document.body.style.top;
    e("body").removeAttr("style"), window.scrollTo(0, -1 * parseInt(t || "0"))
  })), e.jStyling.createSelect(e("select.select")), e("select.select").on("change", (function () {
    if ("" !== e(this).val() && 0 !== e(this).val()) {
      var t = e(this).closest(".jstyling-select");
      t.addClass("selected")
    } else t.removeClass("selected")
  })), e(".connector-selection input[type=radio]").on("change", (function () {
    if (e(this).prop("checked")) {
      var t = e(this).closest(".options-list"), a = e(this).closest(".connector-selection");
      t.find(".connector-selection.active").removeClass("active"), a.addClass("active")
    }
  })), e(".connector-selection input[type=radio]").each((function () {
    if (e(this).prop("checked")) {
      var t = e(this).closest(".options-list"), a = e(this).closest(".connector-selection");
      t.find(".connector-selection.active").removeClass("active"), a.addClass("active")
    }
  })), e(".delivery-selection input").on("change", (function () {
    if (e(this).prop("checked")) {
      var t = e(this).val();
      e(".delivery-variant.active").removeClass("active"), e(".delivery-variant[data-var='" + t + "']").addClass("active")
    }
  })), e(".delivery-selection input").each((function () {
    if (e(this).prop("checked")) {
      var t = e(this).val();
      e(".delivery-variant.active").removeClass("active"), e(".delivery-variant[data-var='" + t + "']").addClass("active")
    }
  })), e(".product-number-more").on("click", (function () {
    var t = e(this).next("input");
    t.val(parseInt(t.val()) + 1), parseInt(t.val()) > 1 ? e(".product-number-less").removeAttr("disabled") : e(".product-number-less").attr("disabled", !0)
  })), e(".product-number-less").on("click", (function () {
    var t = e(this).prev("input");
    parseInt(t.val()) > 1 && (t.val(parseInt(t.val()) - 1), parseInt(t.val()) <= 1 && e(".product-number-less").attr("disabled", !0))
  }))
}));
