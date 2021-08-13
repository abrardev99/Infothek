<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->category->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->excerpt }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <a href="{{ $row->getFirstMediaUrl('thumbnails') ?? '' }}" target="_blank"><img width="50px" src="{{ $row->getFirstMediaUrl('thumbnails') ?? '' }}"></a
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
        <a href="{{ route('post.edit', $row->slug) }}" class="btn btn-primary" type="button">Edit</a>
        <button wire:click="destroy('{{ $row->slug }}')"
                onclick='return confirm("Are you sure about this action ?") || event.stopImmediatePropagation()'
                class="btn btn-danger" type="button">Delete</button>
        <a href="{{ route('post.show', $row->slug) }}" class="btn btn-secondary" type="button">View</a>
    </div>
</x-livewire-tables::bs4.table.cell>
