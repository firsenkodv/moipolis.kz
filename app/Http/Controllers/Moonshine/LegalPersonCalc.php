<?php

namespace App\Http\Controllers\Moonshine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MoonShine\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

class LegalPersonCalc extends  MoonShineController
{
    public function legal_personCalcLife(Request $request): Response
    {

        $data = $request->all();
        Storage::disk('config')->put("moonshine/legal_person/legal_personCalcLife.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();

    }
    public function legal_personCalcAccident(Request $request): Response
    {

        $data = $request->all();
        Storage::disk('config')->put("moonshine/legal_person/legal_personCalcAccident.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();


    }

    public function legal_personCalcCASKO2(Request $request): Response
    {

        $data = $request->all();
        Storage::disk('config')->put("moonshine/legal_person/legal_personCalcCASKO2.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();


    }

    public function legal_personCalcProperty2(Request $request): Response
    {

        $data = $request->all();
        Storage::disk('config')->put("moonshine/legal_person/legal_personCalcProperty2.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();

    }

    public function legal_personCalcAvance(Request $request): Response
    {


        $data = $request->all();
        Storage::disk('config')->put("moonshine/legal_person/legal_personCalcAvance.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();


    }

    public function legal_personCalcResponsibility(Request $request): Response
    {


        $data = $request->all();
        Storage::disk('config')->put("moonshine/legal_person/legal_personCalcResponsibility.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();

    }

}
