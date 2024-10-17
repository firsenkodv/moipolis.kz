<?php

namespace App\Http\Controllers\Moonshine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MoonShine\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

class IndividualCalc extends  MoonShineController
{

    public function individualCalcProperty(Request $request): Response
    {




        $data = $request->all();
        Storage::disk('config')->put("moonshine/individual/individualCalcProperty.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();


    }

    public function individualCalcCASKO(Request $request): Response
    {


        $data = $request->all();
        Storage::disk('config')->put("moonshine/individual/individualCalcCASKO.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();



    }
}
