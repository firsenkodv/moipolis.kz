export function slick() {

    $('.g_type').slick({
        //   slidesToShow: 3,
        slidesToScroll: 1,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: false,
    });




    $('.slick_slider__partners').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 700,
       /* autoplay: true,*/
        autoplaySpeed: 5000,
        responsive: [

            {
                breakpoint: 1140,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }

            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });


    $('.slick_slider__carusel').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        speed: 700,
        /*    autoplay: true,*/
        autoplaySpeed: 5000,
    });


    $('.slick_slider__carusel_ind_legal').slick({
        slidesToShow: 4,
        slidesToScroll: 2,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
        infinite: true,
        speed: 700,
        /*    autoplay: true,*/
        autoplaySpeed: 5000,
    });



}
