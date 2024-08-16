<?php

namespace App\View\Composers;



use App\Models\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CityComposer
{
    public function compose(View $view): void
    {
        // получить данные из сессии:
        $session_city = session('city');
        $session_phone = session('phone');
        $cities  = Cache::rememberForever('cities', function () {

            return City::query()
                ->orderBy('sorting')
                ->get();
        });

        $view->with([
            'session_city' => $session_city,
            'session_phone' => $session_phone,
            'cities' => $cities,
        ]);

    }

}
