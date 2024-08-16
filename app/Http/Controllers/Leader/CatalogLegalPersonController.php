<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Models\CatalogPersonLegal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogLegalPersonController extends Controller
{
    public function category()
    {

        $items =  CatalogPersonLegal::query()
            ->where('published', true)
            ->take(50)
            ->orderBy('sorting')
            ->get();

        return view('pages.leader.legal_person.category', [
            'items' => $items
        ]);
    }

    public function page($slug)
    {

        $items =  CatalogPersonLegal::query()
            ->where('published', true)
            ->take(50)
            ->orderBy('sorting')
            ->get();


        $item =  CatalogPersonLegal::query()
            ->where('published', true)
            ->where('slug',$slug)
            ->orderBy('sorting')
            ->first();


        return view('pages.leader.legal_person.page', [
            'item' => $item,
            'items' => $items
        ]);
    }
}
