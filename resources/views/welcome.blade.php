<x-frontend-layout :title="'Home'" :description="'Home Page '.config('app.name')">
    <!-- Page header with logo and tagline-->
    <x-front.header/>
    <!-- Page content-->
    <div class="container">
        <div class="row">

            @forelse($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4" style="height: 400px">
                        <a href="{{ route('single-post', $post) }}"><img class="card-img-top" src="{{ $post->getFirstMediaUrl('thumbnails') != "" ? $post->getFirstMediaUrl('thumbnails') : 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg' }}"
                                          alt="{{ $post->title }}"/></a>
                        <div class="card-body">
                            <div class="small mb-2 text-muted">{{ $post->created_at->diffForHumans() }} <span class="badge bg-secondary">{{ optional($post->category)->name }}</span></div>
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
