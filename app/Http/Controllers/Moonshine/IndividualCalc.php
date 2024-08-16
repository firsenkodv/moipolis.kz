<?php

namespace App\Http\Controllers\Moonshine;

use Illuminate\Http\Request;
use MoonShine\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

class IndividualCalc extends  MoonShineController
{
    public function individualCalcProperty(Request $request): Response
    {

        $data = $request->all();

        file_put_contents(base_path('config') . '/moonshine/individual/individualCalcProperty.php', "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }
    public function individualCalcCASKO(Request $request): Response
    {

        $data = $request->all();

        file_put_contents(base_path('config') . '/moonshine/individual/individualCalcCASKO.php', "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }
}
