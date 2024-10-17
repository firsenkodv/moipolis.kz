<?php

namespace App\Http\Controllers\Moonshine;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MoonShine\Http\Controllers\MoonShineController;
use Symfony\Component\HttpFoundation\Response;

class MoonshineSetting extends MoonShineController
{

    public function setting(Request $request): Response
    {

        $data = $request->all();
        Storage::disk('config')->put("moonshine/setting.php", "<?php\n\n" . 'return ' . var_export($data, true) . ";\n");

        return back();
    }









}
