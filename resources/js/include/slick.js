export function slick() {


    $('.slick_slider__carusel').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 5000,
    });
    $('.slick_slider__partners').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
    });



    $('.g_type').slick({
        //   slidesToShow: 3,
        slidesToScroll: 1,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: false,

    });



}
