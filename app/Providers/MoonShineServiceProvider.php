<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\Moonshine\LegalPersonCalc;
use App\Models\CatalogIndividual;
use App\MoonShine\Pages\CalcProperty;
use App\MoonShine\Pages\IndividualCalcCASKO;
use App\MoonShine\Pages\IndividualCalcProperty;
use App\MoonShine\Pages\LegalPersonCalcAccident;
use App\MoonShine\Pages\LegalPersonCalcAvance;
use App\MoonShine\Pages\LegalPersonCalcCASKO2;
use App\MoonShine\Pages\LegalPersonCalcLifeProperty;
use App\MoonShine\Pages\legalPersonCalcProperty2;
use App\MoonShine\Pages\LegalPersonCalcResponsibility;
use App\MoonShine\Resources\CatalogIndividualResource;
use App\MoonShine\Resources\CatalogIndividualSettingResource;
use App\MoonShine\Resources\CatalogPersonLegalResource;
use App\MoonShine\Resources\CatalogPersonLegalSettingResource;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\CompanyResource;
use App\MoonShine\Resources\ContactResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\SeoResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [

                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

            MenuGroup::make(static fn() => __('Услуги'), [

                MenuItem::make(
                    static fn() => __('Физические лица'),
                    new CatalogIndividualResource()
                )->icon('heroicons.outline.user'),

                MenuItem::make(
                    static fn() => __('Юридические  лица'),
                    new CatalogPersonLegalResource()
                )->icon('heroicons.outline.users'),

            ]),

            MenuGroup::make(static fn() => __('Страницы'), [

                MenuItem::make(
                    static fn() => __('Материалы'),
                    new PageResource()
                )->icon('heroicons.outline.bars-3'),
                MenuItem::make(
                    static fn() => __('Города'),
                    new CityResource()
                )->icon('heroicons.outline.building-office-2'),
                MenuItem::make(
                    static fn() => __('Контакты'),
                    new ContactResource()
                )->icon('heroicons.outline.map-pin'),

            ]),

            MenuGroup::make(static fn() => __('Настройки'), [

                MenuItem::make(
                    static fn() => __('SEO'),
                    new SeoResource()
                )->icon('heroicons.outline.bug-ant'),

            ]),
            MenuGroup::make(static fn() => __('Страховщики'), [

                MenuItem::make(
                    static fn() => __('Страховые компании'),
                    new CompanyResource()
                )->icon('heroicons.outline.building-office'),

            ]),
            MenuGroup::make(static fn() => __('Калькуляторы'), [
                MenuGroup::make(static fn() => __('Физ. лица'), [
                    MenuItem::make(
                        static fn() => __('Каско для Физ лиц'),
                        new IndividualCalcCASKO()
                    )->icon('heroicons.calculator'),

                    MenuItem::make(
                        static fn() => __('Страхование имущества'),
                        new IndividualCalcProperty()
                    )->icon('heroicons.calculator'),

                    MenuItem::make(
                        static fn() => __('Дополнительные опции'),
                        new CatalogIndividualSettingResource()
                    )->icon('heroicons.cog'),

                ]),

                MenuGroup::make(static fn() => __('Юр. лица'), [
                    MenuItem::make(
                        static fn() => __('Каско для Юр лиц'),
                        new LegalPersonCalcCASKO2()
                    )->icon('heroicons.calculator'),
                    MenuItem::make(
                        static fn() => __('Страхование имущества'),
                        new LegalPersonCalcProperty2()
                    )->icon('heroicons.calculator'),
                    MenuItem::make(
                        static fn() => __('Страхования жизни'),
                        new LegalPersonCalcLifeProperty()
                    )->icon('heroicons.calculator'),
                    MenuItem::make(
                        static fn() => __('Страхования HC'),
                        new LegalPersonCalcAccident()
                    )->icon('heroicons.calculator'),
                    MenuItem::make(
                        static fn() => __('Страхования Аванса'),
                        new LegalPersonCalcAvance()
                    )->icon('heroicons.calculator'),
                    MenuItem::make(
                        static fn() => __('Страхования Пр. ответственности'),
                        new LegalPersonCalcResponsibility()
                    )->icon('heroicons.calculator'),
                    MenuItem::make(
                        static fn() => __('Дополнительные опции'),
                        new CatalogPersonLegalSettingResource()
                    )->icon('heroicons.cog'),

                ]),
            ]),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
