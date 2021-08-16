<x-app-layout :title="'Categories'">
    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <a href="{{ route('category.create') }}" class="btn btn-primary text-white" >New</a>
            </div>
            <div class="card">
                <div class="card-header"><h3>Categories</h3></div>
                <div class="card-body">
                    <livewire:tables.category-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
