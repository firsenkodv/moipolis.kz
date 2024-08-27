<?php

namespace Domain\Policy\ViewModels;


use App\Models\Company;
use App\Models\Contact;
use App\Models\UserPolicy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Support\Traits\Makeable;

class PolicyViewModel
{
    use Makeable;

    public function policy($user_id):Collection|null
    {

           return UserPolicy::query()
                ->where('user_id', $user_id)
                ->where('published', true)
               ->with('company')
               ->with('user')
               ->get();
    }



}
