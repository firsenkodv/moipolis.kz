<?php

namespace App\View\Composers;


use App\Models\CatalogPersonLegal;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuPersonLegalComposer
{
    public function compose(View $view): void
    {
        $legal_persons =  CatalogPersonLegal::query()
            ->where('published', true)
            ->take(50)
            ->orderBy('sorting')
            ->get();



        $view->with([
            'legal_persons' => $legal_persons,
        ]);


    }
}
