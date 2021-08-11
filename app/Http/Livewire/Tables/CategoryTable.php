<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class CategoryTable extends DataTableComponent
{

    public string $defaultSortColumn = 'id';
    public string $defaultSortDirection = 'desc';

    public function filters(): array
    {
        return [
            'category' => Filter::make('Categories')
                ->select([
                    '' => 'Any',
                    3 => 'Child of Modi',
                    1 => 'Child of suscipit',
                ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Name')->sortable()->searchable(),
            Column::make('Slug')->sortable()->searchable(),
            Column::make('Description')->sortable()->searchable(),
            Column::make('Parent Category')->sortable()->searchable(),
            Column::make('Actions'),
        ];
    }

    public function query(): Builder
    {
        return Category::query()
            ->with('parentCategory')
            ->when($this->getFilter('category'), fn ($query, $categoryId) => $query->where('category_id', $categoryId))
            ;
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.category_table';
    }

    public function destroy(Category $category)
    {
        $category->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Course deleted successfully']);
    }
}
