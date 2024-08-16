<?php

namespace App\Http\Controllers\Calculation;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class AjaxCalculationController extends Controller
{

    function calculationData(Request $request)
    {
        if (isset($request->methodName)) {
            $method_name =  $request->methodName;
            $result = $this->$method_name($request->big_data);
            $error = '';

        } else {
            $error = 'No methodName!!!';
        }



        /**
         * возвращаем назад в браузер
         */

        return response()->json([
            'request' => $request->all(),
            'result' => $result,
            'error' => $error,

        ]);
    }


    /**
     *
     * @return array
     * Одна компания
     */

    function company($array):array|null {
        return Company::query()->where('id', $array['json_company_label'])->where('published', true)->first()->toArray();
    }

    /**
     *
     * @return array
     * Все  компании
     */

    function companies($array, $sum):array|int {
        if($array) {
            $companies = [];
            foreach ($array as $k => $r) {

                $company = $this->company($r);

                $companies[$r['json_company_label']]['name'] =      $company['title'];
                $companies[$r['json_company_label']]['value'] =     $r['json_company_text'];
                $companies[$r['json_company_label']]['data'] =      $company;
                $companies[$r['json_company_label']]['sum'] =       $sum;

            }

            return $companies;
        }
        return [];
    }

    /**
     *
     * @return array
     * умножение
     */

    function multiplier($array):array|int {

        if($array) {
            foreach ($array as $k => $r) {

        /*        if ($r['name'] == 'price') {
                    $price = mb_ereg_replace('[\s]', '', $r['value']); // из строки пустые значения
                    $r['value'] = $price;
                }*/

                if ($r['name'] == 'calcname') {
                    $r['value'] = '';
                }

                if ($r['name'] == 'radio') {
                    $r['value'] = '';
                }

                if (is_null($r['name'])) {
                    $r['value'] = '';
                }

                $r['value']  = mb_ereg_replace('[\s]', '', $r['value']); // из строки пустые значения

                $r['value'] = str_replace(",", ".", $r['value']); // заменим запятую на точку

                if ($r['value'] == 0) {
                    $r['value'] = '';
                }

                $array_product[] = $r['value'];

            }


             $array = array_diff($array_product, array(''));
             $result = array_product($array);

             return  $result;

        }

        return [];
    }

    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /** ФИЗИЧЕСКИЕ ЛИЦА */
    /**
     * @param $request
     * @return mixed
     * калькулятор Страхование имущества физический лиц.

     */

    function calcProperty($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */
            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];


            $json_companies = (config('moonshine.individual.individualCalcProperty.json_company'))?:[];


        $r = array_merge($inputs, $options);
        $sum = $this->multiplier($r); // умножаем //
        $companies = $this->companies($json_companies, $sum );


        }

        return $companies;

    }


    /**
    /** ФИЗИЧЕСКИЕ ЛИЦА */
    /**
     /**
     * @param $request
     * @return mixed
     * калькулятор КАСКО ФИЗИЧЕСКИХ ЛИЦ
     */

    function calcCASKO($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */
            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];

            $json_companies = (config('moonshine.individual.individualCalcCASKO.json_company'))?:[];

            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }



        return $companies;

    }



    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
    /**
     */


    /**  ЮРИДИЧЕСКИЕ ЛИЦА */
    /**
     * @param $request
     * @return mixed
     * калькулятор Страхование имущества  ЮРИДИЧЕСКИЕ ЛИЦА.

     */

    function calcProperty2($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */
            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];


            $json_companies = (config('moonshine.legal_person.legal_personCalcProperty2.json_company'))?:[];


            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }

        return $companies;

    }

    /** ЮРИДИЧЕСКИЕ ЛИЦА */
    /**
    /**
     * @param $request
     * @return mixed
     * калькулятор КАСКО ЮРИДИЧЕСКИЕ ЛИЦА
     */

    function calcCASKO2($request)
    {

        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */
            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];

            $json_companies = (config('moonshine.legal_person.legal_personCalcCASKO2.json_company'))?:[];

            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }


        return $companies;

    }




    /**
    /** ЮРИДИЧЕСКИЕ ЛИЦА */
    /**
    /**
     * @param $request
     * @return mixed
     * калькулятор Страхования жизни для ЮРИДИЧЕСКИХ ЛИЦ
     */

    function calcLife($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */
            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];


            $json_companies = (config('moonshine.legal_person.legal_personCalcLife.json_company'))?:[];


            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }

        return $companies;

    }


    /**
    /** ЮРИДИЧЕСКИЕ ЛИЦА */
    /**
    /**
    /**
     * @param $request
     * @return mixed
     * калькулятор юр. лица Обязательное страхование работника от несчастного случая

     */

    function calcAccident($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */


            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];


            $json_companies = (config('moonshine.legal_person.legal_personCalcAccident.json_company'))?:[];


            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }

        return $companies;

    }

    /**
    /** ЮРИДИЧЕСКИЕ ЛИЦА */
    /**
    /**
    /**
     * @param $request
     * @return mixed
     * калькулятор юр. лица Обязательное страхование работника от несчастного случая

     */

    function calcAvance($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */


            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];


            $json_companies = (config('moonshine.legal_person.legal_personCalcAvance.json_company'))?:[];


            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }

        return $companies;

    }


    /**
    /** ЮРИДИЧЕСКИЕ ЛИЦА */
    /**
    /**
    /**
     * @param $request
     * @return mixed
     * калькулятор юр. лица Страхование ответсвенности

     */

    function calcResponsibility($request)
    {


        foreach ($request as $type) {
            /**
             * 1) $type = ['inputs'] -  массив (коэфициетн калькулятора тут)
             * 2) $type = ['options'] - массив
             */


            $inputs = (isset($type['inputs']))?$type['inputs']:[];
            $options = (isset($type['options']))?$type['options']:[];


            $json_companies = (config('moonshine.legal_person.legal_personCalcResponsibility.json_company'))?:[];


            $r = array_merge($inputs, $options);
            $sum = $this->multiplier($r); // умножаем //
            $companies = $this->companies($json_companies, $sum );


        }

        return $companies;

    }





}
