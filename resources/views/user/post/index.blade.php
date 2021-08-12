<x-app-layout :title="'Categories'">
    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <a href="{{ route('post.create') }}" class="btn btn-primary text-white" >New</a>
            </div>
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

    @push('styles')
        @trixassets
    @endpush
</x-app-layout>
