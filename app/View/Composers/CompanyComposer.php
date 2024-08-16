<?php

namespace App\View\Composers;



use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CompanyComposer
{
    public function compose(View $view): void
    {

        $companies  = Cache::rememberForever('companies', function () {

            return Company::query()
                ->where('published', true)
                ->take(50)
                ->orderBy('sorting')
                ->get();
        });

        $view->with([
            'companies' => $companies,
        ]);

    }

}
