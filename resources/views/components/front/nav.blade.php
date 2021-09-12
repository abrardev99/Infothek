<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img width="100px" src="{{ asset('images/logo.png') }}"></a>
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button> --}}
        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
{{--            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">--}}
{{--                @forelse($categories as $category)--}}

{{--                    @if($category->childCategories->count() > 0)--}}
{{--                        <li class="nav-item"><a class="nav-link {{ url()->current() ==  route('category-posts', $category) ? 'active' : '' }} " href="{{ route('category-posts', $category) }}">{{ $category->name }}</a></li>--}}

{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="{{ $category->id }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="{{ $category->id }}">--}}
{{--                                @foreach($category->childCategories as $childCategory)--}}
{{--                                    <li><a class="dropdown-item" href="{{ route('category-posts', $childCategory) }}">{{ $childCategory->name }}</a></li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="nav-item"><a class="nav-link {{ url()->current() ==  route('category-posts', $category) ? 'active' : '' }} " href="{{ route('category-posts', $category) }}">{{ $category->name }}</a></li>--}}
{{--                    @endif--}}

{{--                @empty--}}
{{--                @endforelse--}}
{{--            </ul>--}}
        {{-- </div> --}}
    </div>
</nav>
