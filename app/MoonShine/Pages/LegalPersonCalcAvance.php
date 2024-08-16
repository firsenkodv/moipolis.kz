<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\CatalogIndividualSetting;
use App\Models\CatalogPersonLegalSetting;
use App\Models\City;
use App\Models\Company;
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

class LegalPersonCalcAvance extends Page
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
        return $this->title ?: 'Страхование Аванса для Юр. лиц';
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

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {


        $title = (config('moonshine.legal_person.legal_personCalcAvance.title')) ?: '';

        $json_contract = (config('moonshine.legal_person.legal_personCalcAvance.json_contract')) ?: '';
        $json_moreoptions = (config('moonshine.legal_person.legal_personCalcAvance.json_moreoptions')) ?: '';
        $json_company = (config('moonshine.legal_person.legal_personCalcAvance.json_company')) ?: '';

        return [


            FormBuilder::make('/moonshine/legal_person/legal_person-calc-avance', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Калькулятор'), [


                            Grid::make([
                                Column::make([
                                    Divider::make('Cтоимость аванса'),

                                    Block::make([
                                        Hidden::make('title', 'title')->default($this->title()),
                                        Divider::make('Пользователь вписывает сумму самостоятельно'),

                                    ]),




                                ])->columnSpan(6),


                                Column::make([

                                    Divider::make('Контракт'),

                                    Block::make([
                                        Json::make('Контракт', 'json_contract')->fields([


                                            Text::make('', 'json_contract_label')->hint('Название'),
                                            Text::make('', 'json_contract_text')->hint('Коэффициент'),

                                        ])->vertical()->creatable(limit: 30)
                                            ->removable()->default($json_contract),


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
                                            ->removable()->default($json_moreoptions),


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
                                            ->removable()->default($json_company),


                                    ]),


                                ])->columnSpan(12),
                            ]),
                        ]),


                        Tab::make(__('Коэффициент'), [

                            Divider::make('Коэффициент калькулятора -  Страхование Аванса'),
                            Grid::make([
                                Column::make([
                                    Divider::make('Коэффициент отсутствует'),

                                    Block::make([

                                        Divider::make('В калькуляторе аванса отсутствует коэффициент.'),

                                    ]),



                                ])->columnSpan(12),
                            ]),


                        ]),
                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}
