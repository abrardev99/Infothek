<x-app-layout :title="'Posts'">
    <div class="row">
        <div class="col-12">
            <div class="text-right mb-3">
                <a href="{{ route('post.create') }}" class="btn btn-primary text-white" >New</a>
            </div>
            <div class="card">
                <div class="card-header"><h3>Posts</h3></div>
                <div class="card-body">
                    <livewire:tables.post-table />
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function (){
                $('.c-sidebar-minimizer').trigger('click')
            })
        </script>
    @endpush
</x-app-layout>
