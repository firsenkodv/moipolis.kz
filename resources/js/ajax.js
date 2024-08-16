import {Fancybox} from '@fancyapps/ui';
import {calcProperty,
    calcCASKO,
    calcLife,
    calcAccident,
    calcCASKO2,
    calcProperty2,
    calcAvance,
    calcResponsibility,
    IsError, PriceLocaleString, PersonalInputRange, MyscrollTop} from './culcfunctions.js';

const openTModalFancyError = (e) => {
    Fancybox.show([{src: "#__error", type: "inline",  touch: false}]);
}



function loader(Parents) {
    Parents.find('.wrapper_loader ').css('display', 'flex');
}

function loaderHide(Parents) {
    Parents.find('.wrapper_loader ').css('display', 'none');
}

function printErrorMsg(Parents, msg) {
    $.each(msg, function (key, value) {

        console.log(key);
        console.log(' -- ');
        console.log(msg);

        Parents.find('.error_' + key).text(value);
        Parents.find('input.' + key).addClass('_is-error');
        Parents.find('textarea.' + key).addClass('_is-error');
    });
}

function url() {
    return window.location.href;
}

//todo:jquery
document.addEventListener('DOMContentLoaded', function () {
    /* call_me__js Звонок  (mini форма на главной)*/
    $('body').on('click', '.call_me__js', function (event) {

        var Parents = $(this).parents('.F_form');
        var Name = Parents.find('input[name="name"]').val();
        var Phone = Parents.find('input[name="phone"]').val();
        var Crm = Parents.find('input[name="crm"]').val();
        loader(Parents);

        $.ajax({
            url: "/send-mail/order-call",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "crm": Crm,
                "name": Name,
                "phone": Phone,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        printErrorMsg(Parents, response.error);
                    }, 1000);

                } else {
                    setTimeout(function () {
                        Parents.find('.wrapper_loader ').css('display', 'none');
                        Parents.find('.F_form__body').hide();
                        Parents.find('.F_responce').show();
                    }, 1000);
                }
            }
        });

    });
    /* call_me__js Звонок (mini форма на главной)*/


    IsError() //убрать рамку с input
    PriceLocaleString() //toLocaleString('ru') на inpit class price
    PersonalInputRange() //range на class personal



    $('body').on('click', '.calc__js', function (event) {

        let Parent = $(this).parents('.calc');


        let inputs = [];
        let options = [];
        let big_data = [];
        let error = false;

        Parent.find('.calc_option').each(function (index) {

            if ($(this).hasClass('active')) {
                let object_val = {};
                let object_name = {};
                object_val.name = $(this).find('.off__flex span').text();
                object_val.value = $(this).data('option');
                options.push(object_val);
            }

        });



        Parent.find('[name]').each(function (index, h) {

            // поиск обязательных полей
            $(this).removeClass('_is-error')

            if ($(this).attr('must')) {
                if ($(this).val() == '' || $(this).val() == 0) {

                    $(this).addClass('_is-error');
                    let labelInput = $(this).parents('.text_input').find('.labelInput').text();
                    $('._r_field span').append(labelInput + '<br>');
                    error = true;
                }


            }


            let object_val = {};
            let object_name = {};
            object_val.name = $(this).attr('name');
            object_val.value = $(this).val();
            inputs.push(object_val);

        });

        // проверка обязательных полей
        if (error) {
            openTModalFancyError()

            return false
        }

        /*   console.log(inputs)
             console.log(options)   */
        big_data.push({'inputs': inputs, 'options': options})

        $.ajax({
            url: "/calcSend/big_data",
            method: "POST",
            data: {
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "big_data": big_data,
                "url": url(),
            },
            success: function (response) {
                if (response.error) {
                    console.log(response.error);
                } else {
                    console.log('Первоначальный запрос от AjaxController');
                    console.log(response.request);
                    var methodName = response.methodName;


                    $.ajax({
                        url: "/calcResult.calculation.responce",
                        method: "POST",
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            "big_data": big_data,
                            "methodName": methodName,
                            "url": url(),
                        },
                        success: function (response) {
                            if (response.error) {
                                console.log(response.error);
                            } else {
                                console.log('Полученный ответ от AjaxCalculationController');
                                console.log(response.request);
                                console.log(methodName);
                                let html = '';


                                // физ лица
                                if(methodName == 'calcProperty') {
                                    html = calcProperty(response.result) // см. файл /resources/js/culcfunctions.js
                                }
                                if(methodName == 'calcCASKO') {
                                    html = calcCASKO(response.result) // см. файл /resources/js/culcfunctions.js
                                }

                                // юр. лица
                                if(methodName == 'calcAccident') {
                                    html = calcAccident(response.result) // см. файл /resources/js/culcfunctions.js
                                }

                                if(methodName == 'calcLife') {
                                    html = calcLife(response.result) // см. файл /resources/js/culcfunctions.js
                                }

                                if(methodName == 'calcCASKO2') {
                                    html = calcCASKO2(response.result) // см. файл /resources/js/culcfunctions.js
                                }

                                if(methodName == 'calcProperty2') {
                                    html = calcProperty2(response.result) // см. файл /resources/js/culcfunctions.js
                                }

                                if(methodName == 'calcAvance') {
                                    html = calcAvance(response.result) // см. файл /resources/js/culcfunctions.js

                                }

                                if(methodName == 'calcResponsibility') {
                                    html = calcResponsibility(response.result) // см. файл /resources/js/culcfunctions.js

                                }


                                $('.calc_top_th').show()
                                $('#calc_result').html(html)
                                MyscrollTop()


                            }
                        }

                    });


                }
            }
        });



    });

    //  калькулятор


});






