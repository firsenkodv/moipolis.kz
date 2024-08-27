/*
Физические лица
 */

export function calcProperty(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';


    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort

    return CompaniesSort(companiessort, big_data, methodname);

}

export function calcCASKO(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';
    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort

    return CompaniesSort(companiessort, big_data, methodname);

}




/*
Юридические  лица
 */
export function calcCASKO2(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';
    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort


    return CompaniesSort(companiessort, big_data, methodname);

}

export function calcProperty2(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';
    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort


    return CompaniesSort(companiessort, big_data, methodname);


}


export function calcLife(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';
    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort


    return CompaniesSort(companiessort, big_data, methodname);

}

export function calcAvance(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';
    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort


    return CompaniesSort(companiessort, big_data, methodname);

}

export function calcResponsibility(companies, big_data, methodname) {

    let sum, title, company, coefficient, price, html;
    html = '';
    for (var key in companies) {
        sum = companies[key].sum;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;

    }

    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort

    return CompaniesSort(companiessort, big_data, methodname);

}

export function calcAccident(companies, big_data, methodname) {


    /////

    let Price = $('.fond').val().replace(/\s/g, '');

    let mzp = Number($('.mzp').data('mzp'));

    let Personal = Number($('.personal').val());

    let Risk = Number($('.risk_tarif__js').text());

    let Koef = 1;

    let Radio  = $('.accident_radio__js input[type="radio"]:checked').val();

    if(Radio == 'on') {
        Koef = Number($('#koefy').text());
    }

    let calculation_result =(Price*Risk/100)*Koef;


    if(calculation_result<=mzp) {
        calculation_result = mzp;
    }
    if(calculation_result>=mzp*10) {
        calculation_result = mzp*10;
    }


    /////


    let sum, title, company, coefficient, price;
    for (var key in companies) {
        sum = calculation_result;
        companies[key].sum = calculation_result;
        title = companies[key].name;
        company = companies[key].data;
        coefficient = companies[key].value;
        price = Number(sum)*Number(coefficient);
        companies[key].sum = price;
    }


    let companiessort = Object.entries(companies) // переведем в массив

    companiessort.sort(function(a, b) {
        return parseFloat(a[1].sum) - parseFloat(b[1].sum);
    }); // сортируем по полю sort



    return CompaniesSort(companiessort, big_data, methodname);




}


/**
 *
 * Помошники основных функций калькулятора
 *
 */

function CompaniesSort(companiessort, big_data, methodname) {
    let sum, title, company, coefficient, price, id, html, title_calc;
    html = '';
    for (var key in companiessort) {

        price = companiessort[key][1].sum;
        title = companiessort[key][1].name;
        company = companiessort[key][1].data;
        id = company['id'];
        coefficient = companiessort[key][1].value;
        title_calc = $('h1.h2__title').text()


        let ob = {big_data, price, title, id, title_calc};
        let obString = JSON.stringify(ob);


        html += '<div class="calc_result__company" data-form=\''+ obString +'\'>';
        html += '<div class="c_r__company_flex cborder">';
        html += '<div class="c_r__flex_1">';
        html += '<div class="c_r__img" style="background-image: url(\'/storage/'+ company.img +'\')"></div>';
        html += '<div class="c_r__title"><div class="__label">Компания</div>'+ title +'</div>';
        html += '</div>';


        html += '<div class="c_r__flex_2">';
        html += '<div class="c_r__month"><div class="__label">Срок</div>12 месяцев</div>';
        html += '<div class="c_r__price"><div class="__label">Цена</div>' + Math.round(price).toLocaleString() +' ₸</div>';
        html += '<form action="/calculator/design-of-the-results" method="POST"><input type="hidden" name="dataform" value=\''+ obString +'\' ><input type="hidden" name="_token" value="'+ document.querySelector('meta[name="csrf-token"]').content +'"><input type="hidden" name="methodname" value="' + methodname + '"><div class="c_r__button"><input type="submit" class="button button_normal" value="Купить"></div></form>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

    }
    return html;
}
/**
 *
 * Помошники основных функций калькулятора
 *
 */

export function IsError() {
    //убрать рамку с input

    $('body').on('click', '.calc  ._is-error', function (event) {
        $(this).removeClass('_is-error');

    });

}
export function PriceLocaleString() {
    ///toLocaleString('ru') на inpit class price
    $('body').on('input', '.calc .price', function () {
        this.value = Number(this.value.replace(/\D/g,'')).toLocaleString('ru');
    });

}
export function PersonalInputRange() {
    /////range на class personal

    $('body').on('input', '.personal.input-range', function(){
        var value = this.value.replace(/[^0-9]/g, '');
        if (value < $(this).data('min')) {
            this.value = $(this).data('min');
        } else if (value > $(this).data('max')) {
            this.value = $(this).data('max');
        } else {
            this.value = value;
        }

        let per = Number(this.value);
        let mzp = Number($('.mzp').data('mzp'));
        if(mzp == 0) {
            mzp = 1;
        }
        let Sum = per*mzp*12;
        let Sum2 = per*mzp*12*10;
        Sum = Number(Sum.toString().replace(/^\s+|\s+$/g,'')).toLocaleString('ru')
        Sum2 = Number(Sum2.toString().replace(/^\s+|\s+$/g,'')).toLocaleString('ru')
        $('.mpz_min').text( Sum )
        $('.mpz_max').text( Sum2 )
        $('.fond').val(Sum)

    });
}
export function MyscrollTop() {
    var elementClick = $('#MyscrollTop');
    var destination = $(elementClick).offset().top;
    $("html, body").animate({ scrollTop: destination }, 1100); //1100 - скорость прокрутки

    return false;
}
