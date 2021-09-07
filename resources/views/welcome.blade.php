<x-frontend-layout :title="'Home'" :description="'Home Page '.config('app.name')">
    <!-- Page header with logo and tagline-->
    <x-front.header/>
    <!-- Page content-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3">

                <div class="card mb-4">
                    <div class="card-header">Kategorien</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">

                                @forelse($categories as $category)

                                    @if($category->childCategories->count() > 0)
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <p class="accordion-header" id="flush-headingOne">
                                                    <a class="collapsed"
                                                       type="button"
                                                       data-bs-toggle="collapse"
                                                       data-bs-target="#{{ $category->name }}"
                                                       aria-expanded="false"
                                                       aria-controls="flush-collapseOne"><i class="bi bi-arrow-right-short"></i></a>
                                                    <a href="{{ route('category-posts', $category) }}">{{ $category->name }}</a>
                                                </p>
                                                <div id="{{ $category->name }}" class="accordion-collapse collapse"
                                                     aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">

                                                        @foreach($category->childCategories as $childCategory)
                                                            <p><a href="{{ route('category-posts', $childCategory) }}">{{ $childCategory->name }}</a></p>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <p>
                                            <a href="{{ route('category-posts', $category) }}">{{ $category->name }}</a>
                                        </p>
                                    @endif
                                @empty
                                    <li>No Kategorien Found</li>
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">
                <div class="row">
                    @forelse($posts as $post)
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 400px">
                                <a href="{{ route('single-post', $post) }}"><img class="card-img-top"
                                                                                 src="{{ $post->getFirstMediaUrl('thumbnails') != "" ? $post->getFirstMediaUrl('thumbnails') : 'https://dummyimage.com/700x350/dee2e6/6c757d.jpg' }}"
                                                                                 alt="{{ $post->title }}"/></a>
                                <div class="card-body">
                                    <div class="small mb-2 text-muted">{{ $post->created_at->diffForHumans() }}
                                        @if($post->category)
                                            <a href="{{ route('category-posts', $post->category) }}"><span
                                                    class="badge bg-secondary">{{ $post->category->name }}</span></a>
                                        @endif
                                    </div>
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->excerpt }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <center><h3>No Post Found</h3></center>
                    @endforelse
                <!-- Pagination-->
                    {{ $posts->links('pagination.bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" integrity="sha512-xnP2tOaCJnzp2d2IqKFcxuOiVCbuessxM6wuiolT9eeEJCyy0Vhcwa4zQvdrZNVqlqaxXhHqsSV1Ww7T2jSCUQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
</x-frontend-layout>
