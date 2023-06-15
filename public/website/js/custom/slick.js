$(".suggest-slider").slick({
    dots: !1,
    infinite: !0,
    autoplay: !0,
    arrows: !0,
    speed: 1e3,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    slidesToShow: 6,
    slidesToScroll: 3,
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 5,
            slidesToScroll: 5
        }
    }, {
        breakpoint: 992,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            arrows: !1
        }
    }, {
        breakpoint: 451,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: !1
        }
    }]
}), $(".feature-slider").slick({
    dots: !1,
    infinite: !0,
    speed: 1e3,
    autoplay: !1,
    arrows: !0,
    fade: !1,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 1199,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: !0,
            dots: !0
        }
    }, {
        breakpoint: 991,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: !0,
            dots: !0
        }
    }, {
        breakpoint: 767,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }, {
        breakpoint: 575,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }]
}), $(".recomend-slider").slick({
    dots: !1,
    infinite: !0,
    speed: 1e3,
    autoplay: !0,
    arrows: !0,
    fade: !1,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        }
    }, {
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }, {
        breakpoint: 767,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            // variableWidth: !0
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            // variableWidth: !0,
            arrows: !1
        }
    }]
}), $(".blog-slider").slick({
    dots: !1,
    infinite: !0,
    speed: 800,
    autoplay: !0,
    arrows: !0,
    fade: !1,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: !0,
            arrows: !0
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: !0,
            arrows: !1
        }
    }]
}), $(".feature-card-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: !0,
    arrows: !0,
    fade: !0,
    asNavFor: ".feature-thumb-slider",
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1
        }
    }]
}), $(".feature-thumb-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".feature-card-slider",
    dots: !1,
    arrows: !1,
    autoplay: !0,
    centerMode: !0,
    focusOnSelect: !0,
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: !1
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !1
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !1
        }
    }, {
        breakpoint: 400,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: !1
        }
    }]
}), $(".ad-feature-slider").slick({
    autoplay: !0,
    infinite: !0,
    arrows: !0,
    centerMode: !0,
    centerPadding: "120px",
    speed: 800,
    slidesToShow: 1,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 1200,
        settings: {
            arrows: !0,
            centerMode: !0,
            centerPadding: "60px",
            slidesToShow: 1
        }
    }, {
        breakpoint: 768,
        settings: {
            arrows: !0,
            centerMode: !0,
            centerPadding: "40px",
            slidesToShow: 1
        }
    }, {
        breakpoint: 576,
        settings: {
            arrows: !1,
            centerMode: !0,
            centerPadding: "35px",
            slidesToShow: 1
        }
    }, {
        breakpoint: 401,
        settings: {
            arrows: !1,
            centerMode: !0,
            centerPadding: "0px",
            slidesToShow: 1
        }
    }]
}), $(".ad-details-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: !0,
    arrows: !0,
    fade: !0,
    asNavFor: ".ad-thumb-slider",
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1
        }
    }]
}), $(".ad-thumb-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".ad-details-slider",
    dots: !1,
    arrows: !1,
    autoplay: !0,
    centerMode: !0,
    focusOnSelect: !0,
    responsive: [{
        breakpoint: 992,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !1
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: !1
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: !1
        }
    }]
}), $(".ad-details-feature").slick({
    dots: !1,
    infinite: !0,
    speed: 1e3,
    autoplay: !0,
    arrows: !0,
    fade: !1,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }, {
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: !1
        }
    }]
}), $(".related-slider").slick({
    dots: !1,
    infinite: !0,
    speed: 1e3,
    autoplay: !0,
    arrows: !0,
    fade: !1,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<i class="fas fa-long-arrow-alt-right dandik"></i>',
    nextArrow: '<i class="fas fa-long-arrow-alt-left bamdik"></i>',
    responsive: [{
        breakpoint: 1200,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        }
    }, {
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: !0
        }
    }, {
        breakpoint: 576,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: !0,
            arrows: !1
        }
    }]
});