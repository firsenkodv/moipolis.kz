<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Вывод страницы
     */
    public function page(Page $page)
    {

        if($page->slug == 'home') {
            return redirect(route('home'));
        }

        if(!$page) {
            abort(404);
        }

        return view('pages.page',
            [
                'item' => $page,
            ]);
    }



}
