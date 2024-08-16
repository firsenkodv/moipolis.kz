//todo:jquery
import { upload_f } from './include/ajax';
import { imask } from './include/imask';
import { slick } from './include/slick';
import { input_label, _iserror, check_ } from './include/input';
import { close_flash } from './include/flash';
import {canvas_menu} from "./include/canvas";
import {chosen} from "./include/select";
import {calc} from "./include/calc";
import {menu_js} from "./include/menu";
import {yandex_map_object} from "./include/yandex_map";
import {localDataPicker, datepicker_birthdate} from "./include/datapicker";
import {mobile_menu, add__mobile_menu, mobile_menu_close} from "./include/mobile";
import {translate} from "./include/translate";

document.addEventListener('DOMContentLoaded', function () {

    upload_f() // pзагрузка файлов (Аватар)
    imask() // маска на поле input input[name="phone"]
    slick() // карусел
    input_label() // input движение label
    _iserror() // input удаление  рамки при error
    check_() //      переключение физ и юр. лиц
    close_flash() // закрытие flash
    canvas_menu() // Slidemenu левое меню canvas
    calc() //  для калькуляторов (вcпомогательное для css)
    menu_js() // манипуляции с меню
    yandex_map_object('43db27ba-be61-4e84-b139-ff37ad4802b8') // карта в объект
    chosen() // стилизованный select
    localDataPicker() // календарик основные настройки
    datepicker_birthdate() // календарь дня рождения
    mobile_menu() // работа мобильного меню
    add__mobile_menu() // добавить нужные пункты в меню
    mobile_menu_close() // закрытие мобильного меню
    translate() // зперевод translate

});
