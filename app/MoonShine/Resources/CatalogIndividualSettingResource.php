<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CatalogIndividualSetting;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
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
 * @extends ModelResource<CatalogIndividualSetting>
 */
class CatalogIndividualSettingResource extends ModelResource
{
    protected string $model = CatalogIndividualSetting::class;

    protected string $title = 'Дополнительные опции Физ. Лиц';

    protected string $column = 'sorting';

    protected string $sortColumn = 'sorting';


    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = true;


    protected ?ClickAction $clickAction = ClickAction::EDIT;




    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Text::make(__('Заголовок'), 'title')
                ->required(),

            Date::make(__('Дата создания'), 'created_at')
                ->format("d.m.Y")
                ->default(now()->toDateTimeString())
                ->sortable()
                ->hideOnForm(),
        ];
    }

    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {
        return [
            Block::make([

                        Grid::make([
                            Column::make([


                                Collapse::make('Заголовок опции', [
                                    Text::make('Заголовок', 'title')->required(),

                                ]),




                            ])
                                ->columnSpan(12),


                        ]),



            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [];
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
