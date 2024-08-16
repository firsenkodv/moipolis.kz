<?php

namespace App\View\Composers;



use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CompanyOptionsComposer
{
    public function compose(View $view): void
    {

        $companies  = Cache::rememberForever('companies_options', function () {

            return Company::query()
                ->where('published', true)
                ->take(50)
                ->orderBy('sorting')
                ->get();
        });

        $opt = [];

        foreach ($companies as $company) {

            if($company->options) {

                foreach ($company->options as $option) {

                    $opt[$company->id]['company'] = ($company->title)?:'';
                    $opt[$company->id]['img'] = ($company->img)?:'';
                    $opt[$company->id]['title'] = $option['option_title'];

                            if(count($option['options_json'])) {
                                foreach ($option['options_json'] as $k=>$option_json) {

                                    $opt[$company->id]['json'][$k]['label'] = $option_json['option_label'];
                                    $opt[$company->id]['json'][$k]['text'] = $option_json['option_text'];
                                }
                            }

                }


            }
        }



        $view->with([
            'companies_options' => (object) $opt,
        ]);

    }

}
