export function input_label() {
    /**
     * input движение label
     * */
    var show = 'show';

    $('.inputClass').each(function (index) {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }
    });
    $('.inputClass').change(function () {
        let label = $(this).next('label');
        if ($(this).val() != '') {
            label.addClass(show);
        }

    });


    $('.inputClass').on('checkval', function () {
        let label = $(this).next('label');


        if ($(this).val() != '') {
            label.addClass(show);
        } else {
            label.removeClass(show);
        }


    }).on('keyup', function () {
        $(this).trigger('checkval');
    });

}
export function _iserror() {
    /* удаление  рамки при error */
    $('input[type="text"], input[type="date"], input[type="password"], input[type="email"]').focus(
        function () {
            $(this).parents('.text_input').find('.errorBlade').text('');
            $(this).removeClass('_is-error');
        }
    );
}
export function check_() {
    /* переключение физ и юр. лиц */
    $('body').on('click', '.h_sl_a2__js p', function (event) {
        $('.h_sl_a2__js').removeClass('active');
        $(this).parent('.h_sl_a2__js').addClass('active');
        let Tp = $(this).data('type');
        $('.g_type').removeClass('active');
        $('.'+Tp).addClass('active');

        $('.___carusel_wrap').each(function( index ) {
                $(this).toggleClass('active')
        });




    });

}
