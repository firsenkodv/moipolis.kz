<?php

namespace App\Http\Controllers\Moonshine;

use Illuminate\Http\Request;
use MoonShine\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

class MoonshineSetting extends MoonShineController
{

    public function setting(Request $request): Response
    {

        $data = $request->all();


        file_put_contents(base_path('config') . '/moonshine/setting.php', "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }









}
