<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none" style="background-color: white">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" class="c-sidebar-brand-full" width="118" height="46" alt="{{ config('app.name') }} Logo"></a>
    </div>
    <ul class="c-sidebar-nav">
{{--        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('dashboard') }}">--}}
{{--                <svg class="c-sidebar-nav-icon">--}}
{{--                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>--}}
{{--                </svg>--}}
{{--                Dashboard</a></li>--}}

        @if(auth()->check())
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('category.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-line-weight') }}"></use>
                    </svg>
                    Categories Management
                </a>
            </li>

            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('post.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-newspaper') }}"></use>
                    </svg>
                    Posts Management
                </a>
            </li>
        @endif


    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
