<?php

namespace App\Http\Livewire\Tables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Post;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class PostTable extends DataTableComponent
{

    public array $parentCategoriesKeys = [];
    public string $defaultSortColumn = 'id';
    public string $defaultSortDirection = 'desc';
    public array $filterNames = [
        'category' => 'Posts where category',
    ];

    public function mount()
    {
        $this->parentCategoriesKeys = Category::whereNull('category_id')->pluck('name', 'id')->toArray();
    }

    public function filters(): array
    {
        return [
            'category' => Filter::make('Categories')
                ->select(
                    ['' => 'Any',]
                    +
                    $this->parentCategoriesKeys,
                ),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Title')->sortable()->searchable(),
            Column::make('Category'),
            Column::make('Excerpt')->sortable()->searchable(),
            Column::make('Thumbnail'),
        ];
    }

    public function query(): Builder
    {
        return Post::query()
            ->with(['category', 'media'])
            ->when($this->getFilter('category'), fn ($query, $categoryId) => $query->where('category_id', $categoryId));
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.post_table';
    }

    public function destroy(Post $post)
    {
        $post->delete();
        $this->dispatchBrowserEvent('success', ['message' => 'Post deleted successfully']);
    }
}
