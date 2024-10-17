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

class LegalPersonCalcResponsibility extends Page
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
        return $this->title ?: 'Страхование профессиональной ответсвенности  для Юр. лиц';
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

        if (Storage::disk('config')->exists('moonshine/legal_person/legal_personCalcResponsibility.php')) {
            $result = include(storage_path('app/public/config/moonshine/legal_person/legal_personCalcResponsibility.php'));
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



       $title = (config('moonshine.legal_person.legal_personCalcAvance.title')) ?: '';
        $json_profession = (config('moonshine.legal_person.legal_personCalcResponsibility.json_profession')) ?: '';
        $json_moreoptions = (config('moonshine.legal_person.legal_personCalcResponsibility.json_moreoptions')) ?: '';
        $json_company = (config('moonshine.legal_person.legal_personCalcResponsibility.json_company')) ?: '';

        return [


            FormBuilder::make('/moonshine/legal_person/legal_person-calc-responsibility', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Калькулятор'), [


                            Grid::make([
                                Column::make([
                                    Divider::make('Рыночная стоимость профессиональной ответсвенности'),

                                    Block::make([
                                        Hidden::make('title', 'title')->default($this->title()),
                                        Divider::make('Пользователь вписывает сумму самостоятельно'),

                                    ]),




                                ])->columnSpan(6),


                                Column::make([

                                    Divider::make('Профессия'),

                                    Block::make([
                                        Json::make('Профессия', 'json_profession')->fields([


                                            Text::make('', 'json_profession_label')->hint('Название'),
                                            Text::make('', 'json_profession_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 30)
                                            ->removable()->default((isset($json_profession))? $json_profession : ''),


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
                                            ->removable()->default((isset($json_moreoptions))? $json_moreoptions : ''),


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
                                            ->removable()->default((isset($json_company))? $json_company : ''),


                                    ]),


                                ])->columnSpan(12),
                            ]),
                        ]),


                        Tab::make(__('Коэффициент'), [

                            Divider::make('Коэффициент калькулятора -  Страхование профессиональной ответсвенности для Юр. лиц'),
                            Grid::make([
                                Column::make([
                                    Divider::make('Коэффициент отсутствует'),

                                    Block::make([

                                        Divider::make('В калькуляторе  отсутствует коэффициент.'),

                                    ]),



                                ])->columnSpan(12),
                            ]),


                        ]),
                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}
