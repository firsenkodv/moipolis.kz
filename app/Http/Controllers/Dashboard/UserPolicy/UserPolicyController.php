<?php

namespace App\Http\Controllers\Dashboard\UserPolicy;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use Domain\Policy\ViewModels\PolicyViewModel;
use Illuminate\Http\RedirectResponse;

class UserPolicyController extends Controller
{
    public function userPolicy()
    {
        $user = auth()->user();

        $items = PolicyViewModel::make()->policy($user->id);

   /*     foreach ($items as $item) {
            dd($item->company);
        }*/

        return view('dashboard.user_policies.user_page', [
            'user' => $user,
            'items' => $items
        ]);

    }

    public function userPolicies()
    {
        return true;
    }

}
