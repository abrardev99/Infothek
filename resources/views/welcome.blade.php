<x-frontend-layout :title="'Home'" :description="'Home Page '.config('app.name')">
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="form"> <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Search anything..." autofocus> </div>
                </div>
            </div>

        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">

            @forelse($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4" style="height: 400px">
                        <a href="#!"><img class="card-img-top" src="{{ $post->getFirstMediaUrl('thumbnails') != "" ? $post->getFirstMediaUrl('thumbnails') : 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg' }}"
                                          alt="{{ $post->title }}"/></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->created_at->diffForHumans() }}</div>
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <!-- Pagination-->
            {{ $posts->links('pagination.bootstrap-5') }}

        </div>
    </div>
</x-frontend-layout>
