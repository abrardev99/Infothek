<x-frontend-layout :title="$post->title" :description="$post->excerpt">
    <x-front.header/>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <img class="card-img-top"
                         src="{{ $post->getFirstMediaUrl('thumbnails') != "" ? $post->getFirstMediaUrl('thumbnails') : 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg' }}"
                         alt="{{ $post->title }}"/>
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">
                            {!! $post->content !!}
                        </p>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">

                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Post Meta</div>
                    <div class="card-body">
                        <div class="small mb-2 text-muted">Published {{ $post->created_at->diffForHumans() }}
                            by {{ optional($post->user)->name }}</div>
                        Category
                        @if($post->category)
                            <a href="{{ route('category-posts', $post->category) }}"><span class="badge bg-secondary">{{ $post->category->name }}</span></a>
                        @else
                            <span class="badge bg-secondary"><i>Undefined</i></span>
                        @endif
                    </div>
                </div>

                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Post Excerpt</div>
                    <div class="card-body">{{ $post->excerpt }}</div>
                </div>


                <div class="card mb-4">
                    <div class="card-header">Related Posts</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @forelse($relatedPosts as $relatedPost)
                                        <li>
                                            <a href="{{ route('single-post', $relatedPost) }}">{{ $relatedPost->title }}</a>
                                        </li>
                                    @empty
                                        <li>No Post Found</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-frontend-layout>
