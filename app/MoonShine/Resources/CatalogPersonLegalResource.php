<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CatalogPersonLegal;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<CatalogPersonLegal>
 */
class CatalogPersonLegalResource extends ModelResource
{
    protected string $model = CatalogPersonLegal::class;

    protected string $title = 'Юридические лица';

    protected string $column = 'sorting';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;


    public function filters(): array
    {
        return [
            ID::make()
                ->useOnImport()
                ->showOnExport(),

            Text::make('Название', 'title')
                ->useOnImport()
                ->showOnExport(),
        ];
    }


    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Image::make(__('Изображение'), 'img')
                ->showOnExport()
                ->disk(config('moonshine.disk', 'moonshine'))
                ->dir('category')
                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg']),

            Text::make(__('Заголовок'), 'title')
                ->required(),
            Slug::make(__('Алиас'), 'slug')
                ->from('title')
                ->hint('url адрес, обязательное поле')
                ->unique(),
            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),
            Number::make('Сорт.', 'sorting')->sortable()


        ];
    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {

        $this->calc();

        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique()
                                ]),


                                Text::make(__('Подзаголовок'), 'subtitle'),
                                Text::make(__('Заголовок в меню'), 'title_menu'),

                                Image::make(__('Изображение'), 'img')
                                    ->showOnExport()
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('category')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable(),

                                Column::make([
                                    TinyMce::make('Краткое описание', 'smalltext')
                                ])


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle')->unescape(),
                                    Text::make('Мета тэг (description) ', 'description')->unescape(),
                                    Text::make('Мета тэг (keywords) ', 'keywords')->unescape(),
                                    Switcher::make('Публикация', 'published')->default(1),

                                ]),
                                Collapse::make('Служебные', [

                                    Number::make('Сортировка','sorting')->buttons()->default(0)

                                ]),


                            ])
                                ->columnSpan(6)

                        ]),
                        Divider::make(),

                        Column::make([
                            TinyMce::make('Описание', 'text')
                        ])->columnSpan(12),

                        Divider::make('Дополнительное изображение на страницу'),

                        Image::make(__('Изображение'), 'img2')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'moonshine'))
                            ->dir('category')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                            ->removable()
                            ->hint('Растягивается на 100% ширины'),
                    ]),


                    Tab::make(__('Калькулятор'), [


                        Select::make('Выбрать калькулятор', 'params')
                            ->options([$this->calc()])->searchable(),


                    ]),
                ]),


            ]),
        ];


    }



    public function calc()
    {

        $path = storage_path("app/public/config/moonshine/legal_person");
        return $this->list_files($path);

    }

    public function list_files($path)
    {
        if ($path[mb_strlen($path) - 1] != '/') {
            $path .= '/';
        }

        $files = array();

        $dh = opendir($path);
        while (false !== ($file = readdir($dh))) {
            if ($file != '.' && $file != '..' && !is_dir($path . $file) && $file[0] != '.') {
                $files[] = $file;
            }
        }

        closedir($dh);

        if ($files) {

            $array[0] = '---';
            foreach ($files as $file) {
                $f = pathinfo($file, PATHINFO_FILENAME); // file
                $array[$f] = (config2('moonshine.legal_person.' . $f . '.title')) ?: '';

            }
        }

        return $array;
    }


    public function rules(Model $item): array
    {
        return [
            'metatitle' => 'max:2024',
            'description' => 'max:2024',
            'keywords' => 'max:2024',
        ];
    }


    public function import(): ?ImportHandler
    {
        return null;
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }


    public function treeKey(): ?string
    {
        return null;
    }

    public function sortKey(): string
    {
        return 'sorting';
    }
}
