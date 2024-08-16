<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Models\CatalogIndividual;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogIndividualController extends Controller
{
    public function category()
    {

        $items =  CatalogIndividual::query()
            ->where('published', true)
            ->take(50)
            ->orderBy('sorting')
            ->get();

        return view('pages.leader.individual.category', [
            'items' => $items
        ]);
    }

    public function page($slug)
    {

        $item =  CatalogIndividual::query()
            ->where('published', true)
            ->where('slug',$slug)
            ->orderBy('sorting')
            ->first();

        $items =  CatalogIndividual::query()
            ->where('published', true)
            ->take(50)
            ->orderBy('sorting')
            ->get();

        return view('pages.leader.individual.page', [
            'items' => $items,
            'item' => $item
        ]);
    }


}
