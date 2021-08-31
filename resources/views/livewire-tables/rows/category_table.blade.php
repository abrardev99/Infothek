<x-livewire-tables::bs4.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->slug }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->description }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->parentCategory->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
        <a href="{{ route('category.edit', $row->slug) }}" class="btn btn-primary" type="button">Edit</a>
        <button wire:click="destroy('{{ $row->slug }}')"
                onclick='return confirm("Category,  attached child categories and related Posts will be deleted. Are you sure about this action ?") || event.stopImmediatePropagation()'
                class="btn btn-danger" type="button">Delete</button>
    </div>
</x-livewire-tables::bs4.table.cell>
