<?php

namespace App\Http\Livewire\Tables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Post;

class PostTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Title'),
            Column::make('Category'),
            Column::make('Excerpt'),
            Column::make('Thumbnail'),
        ];
    }

    public function query(): Builder
    {
        return Post::query()
            ->with(['category', 'media']);
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
