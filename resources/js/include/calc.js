export function calc() {
    //снопки доп. опций
    $('body').on('click', '.calc_options .calc_option', function (event) {
        $(this).toggleClass('active');
    });






    $(".js-chosen_risk_tarif__js").chosen({

        disable_search_threshold: 10

    }).change(function(event){

        if(event.target == this){
            // alert($(this).val());
            $('.risk_tarif__js').text($(this).val())
        }

    });

    $('body').on('click', '.accident_radio__js input[type="radio"]', function (event) {

        let Radio  = $('.accident_radio__js input[type="radio"]:checked').val();
        if(Radio == 'off') {
            $('.accident_true').slideUp();
        }
        if(Radio == 'on') {
            $('.accident_true').slideDown();
        }

    });


    $(".js-chosen_work__js").chosen({

        disable_search_threshold: 10

    }).change(function (event) {

        if (event.target == this) {

            /*       alert($(this).val());
                   alert($("#qy551").val());*/

            let d = $(this).val();
            let c = $("#qy551").val();
            if (d == "1") {
                if (c == "1") {
                    $("#koefy").text("3")
                }
                if (c == "2") {
                    $("#koefy").text("3.4")
                }
                if (c == "3") {
                    $("#koefy").text("3.8")
                }
                if (c == "4") {
                    $("#koefy").text("4")
                }
                if (c == "5") {
                    $("#koefy").text("1")
                }
                if (c == "6") {
                    $("#koefy").text("1")
                }
                if (c == "7") {
                    $("#koefy").text("1")
                }
            }

            if (d == "2") {
                if (c == "1") {
                    $("#koefy").text("2")
                }
                if (c == "2") {
                    $("#koefy").text("3.2")
                }
                if (c == "3") {
                    $("#koefy").text("3.3")
                }
                if (c == "4") {
                    $("#koefy").text("3.5")
                }
                if (c == "5") {
                    $("#koefy").text("3.6")
                }
                if (c == "6") {
                    $("#koefy").text("4")
                }
                if (c == "7") {
                    $("#koefy").text("1")
                }
            }

            if (d == "3") {
                if (c == "1") {
                    $("#koefy").text("1.75")
                }
                if (c == "2") {
                    $("#koefy").text("3")
                }
                if (c == "3") {
                    $("#koefy").text("3.2")
                }
                if (c == "4") {
                    $("#koefy").text("3.3")
                }
                if (c == "5") {
                    $("#koefy").text("3.5")
                }
                if (c == "6") {
                    $("#koefy").text("3.75")
                }
                if (c == "7") {
                    $("#koefy").text("4")
                }
            }

            if (d == "4") {
                if (c == "1") {
                    $("#koefy").text("1")
                }
                if (c == "2") {
                    $("#koefy").text("2.5")
                }
                if (c == "3") {
                    $("#koefy").text("2.75")
                }
                if (c == "4") {
                    $("#koefy").text("3")
                }
                if (c == "5") {
                    $("#koefy").text("3.4")
                }
                if (c == "6") {
                    $("#koefy").text("3.5")
                }
                if (c == "7") {
                    $("#koefy").text("3.8")
                }
            }

            if (d == "5") {
                if (c == "1") {
                    $("#koefy").text("1")
                }
                if (c == "2") {
                    $("#koefy").text("1.25")
                }
                if (c == "3") {
                    $("#koefy").text("2.4")
                }
                if (c == "4") {
                    $("#koefy").text("3.1")
                }
                if (c == "5") {
                    $("#koefy").text("3")
                }
                if (c == "6") {
                    $("#koefy").text("3.2")
                }
                if (c == "7") {
                    $("#koefy").text("3.6")
                }
            }

            if (d == "6") {
                if (c == "1") {
                    $("#koefy").text("1")
                }
                if (c == "2") {
                    $("#koefy").text("1.1")
                }
                if (c == "3") {
                    $("#koefy").text("1.25")
                }
                if (c == "4") {
                    $("#koefy").text("1.5")
                }
                if (c == "5") {
                    $("#koefy").text("2")
                }
                if (c == "6") {
                    $("#koefy").text("3")
                }
                if (c == "7") {
                    $("#koefy").text("3.5")
                }
            }

        }

    });

    $(".js-chosen_count__js").chosen({

        disable_search_threshold: 10

    }).change(function (event) {

        if (event.target == this) {

            /*            alert($(this).val());
                        alert($("#qy55").val());*/

            let c = $(this).val();
            let d = $("#qy55").val();

            if (d == "1") {
                if (c == "1") {
                    $("#koefy").text("3")
                }
                if (c == "2") {
                    $("#koefy").text("3.4")
                }
                if (c == "3") {
                    $("#koefy").text("3.8")
                }
                if (c == "4") {
                    $("#koefy").text("4")
                }
                if (c == "5") {
                    $("#koefy").text("1")
                }
                if (c == "6") {
                    $("#koefy").text("1")
                }
                if (c == "7") {
                    $("#koefy").text("1")
                }
            }
            if (d == "2") {
                if (c == "1") {
                    $("#koefy").text("2")
                }
                if (c == "2") {
                    $("#koefy").text("3.2")
                }
                if (c == "3") {
                    $("#koefy").text("3.3")
                }
                if (c == "4") {
                    $("#koefy").text("3.5")
                }
                if (c == "5") {
                    $("#koefy").text("3.6")
                }
                if (c == "6") {
                    $("#koefy").text("4")
                }
                if (c == "7") {
                    $("#koefy").text("1")
                }
            }
            if (d == "3") {
                if (c == "1") {
                    $("#koefy").text("1.75")
                }
                if (c == "2") {
                    $("#koefy").text("3")
                }
                if (c == "3") {
                    $("#koefy").text("3.2")
                }
                if (c == "4") {
                    $("#koefy").text("3.3")
                }
                if (c == "5") {
                    $("#koefy").text("3.5")
                }
                if (c == "6") {
                    $("#koefy").text("3.75")
                }
                if (c == "7") {
                    $("#koefy").text("4")
                }
            }
            if (d == "4") {
                if (c == "1") {
                    $("#koefy").text("1")
                }
                if (c == "2") {
                    $("#koefy").text("2.5")
                }
                if (c == "3") {
                    $("#koefy").text("2.75")
                }
                if (c == "4") {
                    $("#koefy").text("3")
                }
                if (c == "5") {
                    $("#koefy").text("3.4")
                }
                if (c == "6") {
                    $("#koefy").text("3.5")
                }
                if (c == "7") {
                    $("#koefy").text("3.8")
                }
            }
            if (d == "5") {
                if (c == "1") {
                    $("#koefy").text("1")
                }
                if (c == "2") {
                    $("#koefy").text("1.25")
                }
                if (c == "3") {
                    $("#koefy").text("2.4")
                }
                if (c == "4") {
                    $("#koefy").text("3.1")
                }
                if (c == "5") {
                    $("#koefy").text("3")
                }
                if (c == "6") {
                    $("#koefy").text("3.2")
                }
                if (c == "7") {
                    $("#koefy").text("3.6")
                }
            }
            if (d == "6") {
                if (c == "1") {
                    $("#koefy").text("1")
                }
                if (c == "2") {
                    $("#koefy").text("1.1")
                }
                if (c == "3") {
                    $("#koefy").text("1.25")
                }
                if (c == "4") {
                    $("#koefy").text("1.5")
                }
                if (c == "5") {
                    $("#koefy").text("2")
                }
                if (c == "6") {
                    $("#koefy").text("3")
                }
                if (c == "7") {
                    $("#koefy").text("3.5")
                }
            }

        }

    });

}
