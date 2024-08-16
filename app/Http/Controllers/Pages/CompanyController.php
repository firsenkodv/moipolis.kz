<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Page;
use Domain\Company\ViewModels\CompanyViewModel;

class CompanyController extends Controller
{
    /**
     * Вывод страницы
     */
    public function company($slug)
    {

        $page  = CompanyViewModel::make()->company($slug);

        if(!$page) {
                abort(404);
        }

        return view('pages.company.company',
            [
                'item' => $page,
            ]);
    }



}
