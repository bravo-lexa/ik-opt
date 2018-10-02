/*
  * Добавочные скрипты
  *
*/
$(function () {
    $('.index__top-img .slider').owlCarousel({
        items:1,
        lazyLoad:true,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
    });
    $('.index__partners__list').owlCarousel({
        items: 6,
        lazyLoad:true,
        loop:true,
        margin: 0,
        dots: false,
        nav: true,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:3
            },
            992:{
                items:5
            },
            1000:{
                items:5
            }
        }
    });

    $("[data-popup]").fancybox({
        baseClass: "is-open",
    });

});
