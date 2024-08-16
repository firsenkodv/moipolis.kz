<?php

namespace Domain\Company\ViewModels;


use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class CompanyViewModel
{
    use Makeable;

    public function company($slug):Model|null
    {

           return Company::query()
                ->where('slug', $slug)
                ->where('published', true)
                ->first();



    }



}
