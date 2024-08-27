<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;


use App\MoonShine\Fields\BusinessCard;
use App\MoonShine\Fields\ItemAmount;
use MoonShine\Components\Card;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\File;
use MoonShine\Fields\Hidden;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class SettingPage extends Page
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
        return $this->title ?: 'Настройки сайта';
    }



    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {


        $contact_title = (config('moonshine.setting.contact_title')) ?: '';
        $contact_name_company = (config('moonshine.setting.contact_name_company')) ?: '';
        $contact_republic = (config('moonshine.setting.contact_republic')) ?: '';
        $contact_address = (config('moonshine.setting.contact_address')) ?: '';
        $contact_copy = (config('moonshine.setting.contact_copy')) ?: '';
        $phone1 = (config('moonshine.setting.phone1')) ?: '';
        $phone2 = (config('moonshine.setting.phone2')) ?: '';
        $email = (config('moonshine.setting.email')) ?: '';
        $slogan1 = (config('moonshine.setting.slogan1')) ?: '';
        $slogan2 = (config('moonshine.setting.slogan2')) ?: '';
        $footer_title = (config('moonshine.setting.footer_title')) ?: '';
        $footer_text = (config('moonshine.setting.footer_text')) ?: '';

        $contact_file = (config('moonshine.setting.contact_file')) ?: '';

        $facebook = (config('moonshine.setting.facebook')) ?: '';
        $youtube = (config('moonshine.setting.youtube')) ?: '';
        $instagram = (config('moonshine.setting.instagram')) ?: '';
        $whatsapp = (config('moonshine.setting.whatsapp')) ?: '';
        $telegram = (config('moonshine.setting.telegram')) ?: '';


        return [

            FormBuilder::make('/moonshine/setting', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Настройки'), [


                            Grid::make([


                                Column::make([
                                    Divider::make('Константы'),

                                    Block::make([
                                        Text::make('Название', 'slogan2')->default($slogan2),
                                        Text::make('Название в логотипе', 'slogan1')->default($slogan1),



                                    ]),
                                    Divider::make('Соц.сети'),

                                    Block::make([
                                        Text::make('FaceBook', 'facebook')->default($facebook),
                                        Text::make('YouTube', 'youtube')->default($youtube),
                                        Text::make('Instagram', 'instagram')->default($instagram),
                                        Text::make('WhatsApp', 'whatsapp')->default($whatsapp),
                                        Text::make('Telegram', 'telegram')->default($telegram),
                                    ]),


                                ])->columnSpan(6),


                                Column::make([
                                    Divider::make('Контакты'),

                                    Block::make([
                                        Text::make('Название компании', 'contact_name_company')->default($contact_name_company),
                                        Text::make('Республика', 'contact_republic')->default($contact_republic),
                                        Text::make('Адрес', 'contact_address')->default($contact_address),
                                        Text::make('Copyright', 'contact_copy')->default($contact_copy),
                                        Text::make(__('Телефон'), 'phone1')->default($phone1),
                                        Text::make(__('Телефон 2'), 'phone2')->default($phone2),
                                        Text::make(__('Email'), 'email')->default($email),
                                    ]),


                                ])->columnSpan(6),
                            ]),
                        ]),

                        Tab::make(__('Дополнительные опции'), [

                            Divider::make('Дополнительные опции'),
                            Grid::make([
                                Column::make([


                                    Block::make([



                                    ]),


                                ])->columnSpan(12),
                            ])


                        ]),

                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}
