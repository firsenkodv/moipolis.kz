<?php

namespace App\Providers;




use App\View\Composers\CityComposer;
use App\View\Composers\CompanyComposer;
use App\View\Composers\CompanyOptionsComposer;
use App\View\Composers\IndividualPersonLegalComposer;
use App\View\Composers\MenuIndividualComposer;
use App\View\Composers\MenuPersonLegalComposer;
use App\View\Composers\UserRoleComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer(['include.blocks.home_section__slider', 'include.menu.menu_top', 'modules.module_0', 'termplates.axeld.footer'], MenuIndividualComposer::class);
        View::composer(['include.blocks.home_section__slider', 'modules.module_5', 'modules.module_0', 'include.menu.menu_top'], MenuPersonLegalComposer::class);
        View::composer(['pages.contacts'], CityComposer::class);
        View::composer(['modules.module_3', 'termplates.axeld.footer'], CompanyComposer::class);
        View::composer(['modules.module_2'], CompanyOptionsComposer::class);




    }
}
