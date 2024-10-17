<?php

namespace App\View\Composers;


use App\Models\CatalogIndividual;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuIndividualComposer
{
    public function compose(View $view): void
    {

        $individuals =  CatalogIndividual::query()
            ->where('published', true)
            ->take(50)
            ->orderBy('sorting')
            ->get();

        $view->with([
            'individuals' => $individuals,
        ]);

    }
}
