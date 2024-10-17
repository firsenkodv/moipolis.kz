<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\CatalogIndividualSetting;
use App\Models\CatalogPersonLegalSetting;
use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Hidden;
use MoonShine\Fields\Json;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class LegalPersonCalcProperty2 extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Страхование имущества для Юр. лиц';
    }

    public function city(): array|null
    {
        $items = City::query()->select('id', 'city')->get()->toArray();
        $c = [];
        foreach ($items as $item) {
            $c[$item['id']] = $item['city'];
        }
        return (count($c)) ? $c : null;

    }

    public function company(): array|null
    {
        $items = Company::query()->select('id', 'title', 'title_mini')->get()->toArray();
        $c = [];
        foreach ($items as $item) {
            $c[$item['id']] = (isset($item['title_mini'])) ? $item['title_mini'] : $item['title'];
        }
        return (count($c)) ? $c : null;

    }

    public function moreOptions(): array|null
    {
        $items = CatalogPersonLegalSetting::query()->select('id', 'title')->get()->toArray();
        $i = [];
        $i[0] = '---';
        foreach ($items as $item) {
            $i[$item['id']] = $item['title'];
        }
        return (count($i)) ? $i : null;

    }


    public function setting()
    {

        if (Storage::disk('config')->exists('moonshine/legal_person/legal_personCalcProperty2.php')) {
            $result = include(storage_path('app/public/config/moonshine/legal_person/legal_personCalcProperty2.php'));
        } else {
            $result = null;
        }

        return (is_array($result)) ? $result : null;

    }


    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {

        if(!is_null($this->setting())) {
            extract($this->setting());
        }



        $title = (config('moonshine.legal_person.legal_personCalcProperty2.title')) ?: '';
        $json_object = (config('moonshine.legal_person.legal_personCalcProperty2.json_object')) ?: '';
        $json_city = (config('moonshine.legal_person.legal_personCalcProperty2.json_city')) ?: '';
        $json_fra = (config('moonshine.legal_person.legal_personCalcProperty2.json_fra')) ?: '';
        $json_moreoptions = (config('moonshine.legal_person.legal_personCalcProperty2.json_moreoptions')) ?: '';
        $coefficient = (config('moonshine.legal_person.legal_personCalcProperty2.coefficient')) ?: '';
        $json_company = (config('moonshine.legal_person.legal_personCalcProperty2.json_company')) ?: '';

        return [


            FormBuilder::make('/moonshine/legal_person/legal_person-calc-property2', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Калькулятор'), [


                            Grid::make([
                                Column::make([
                                    Divider::make('Рыночная стоимость имущества'),

                                    Block::make([
                                        Hidden::make('title', 'title')->default($this->title()),
                                        Divider::make('Пользователь вписывает сумму самостоятельно'),

                                    ]),
                                    Divider::make('Объект страхования'),


                                    Block::make([

                                        Divider::make('Объект'),
                                        Json::make('Опции', 'json_object')->fields([

                                            Text::make('', 'json_object_label')->hint('Название'),
                                            Text::make('', 'json_object_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 30)
                                            ->removable()->default((isset($json_object))? $json_object : ''),

                                    ]),


                                ])->columnSpan(6),


                                Column::make([
                                    Divider::make('Город'),

                                    Block::make([

                                        Json::make('Город', 'json_city')->fields([

                                            Select::make('Выбрать город', 'json_city_label')
                                                ->options($this->city())->searchable(),
                                            Text::make('', 'json_city_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 30)
                                            ->removable()->default((isset($json_city))? $json_city : ''),


                                    ]),
                                    Divider::make('Франшиза'),

                                    Block::make([
                                        Json::make('Франшиза', 'json_fra')->fields([


                                            Text::make('', 'json_fra_label')->hint('Название'),
                                            Text::make('', 'json_fra_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 30)
                                            ->removable()->default((isset($json_fra))? $json_fra : '' ),


                                    ])
                                ])->columnSpan(6),
                            ]),
                        ]),
                        Tab::make(__('Дополнительные опции'), [

                            Divider::make('Дополнительные опции'),
                            Grid::make([
                                Column::make([


                                    Block::make([

                                        Json::make('', 'json_moreoptions')->fields([

                                            Select::make('Выбрать опцию', 'json_moreoptions_label')
                                                ->options($this->moreOptions())->searchable(),
                                            Text::make('', 'json_moreoptions_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 300)
                                            ->removable()->default((isset($json_moreoptions))? $json_moreoptions : '' ),


                                    ]),


                                ])->columnSpan(12),
                            ])


                        ]),
                        Tab::make(__('Страховые компании'), [

                            Divider::make('Страховые компании'),
                            Grid::make([
                                Column::make([

                                    Block::make([
                                        Json::make('Компания', 'json_company')->fields([

                                            Select::make('Выбрать компанию', 'json_company_label')
                                                ->options($this->company())->searchable(),
                                            Text::make('', 'json_company_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 30)
                                            ->removable()->default((isset($json_company))? $json_company : '' ),


                                    ]),


                                ])->columnSpan(12),
                            ]),
                        ]),


                        Tab::make(__('Коэффициент'), [

                            Divider::make('Коэффициент калькулятора -  Страхование имущества для Юр. лиц'),
                            Grid::make([
                                Column::make([
                                    Block::make([
                                        Text::make('Коэффициент', 'coefficient')->hint('Коэффициент Страхование имущества для Юр. лиц')->default((isset($coefficient))? $coefficient : '' ),
                                    ])


                                ])->columnSpan(12),
                            ]),


                        ]),
                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}
