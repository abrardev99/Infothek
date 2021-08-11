<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" class="c-sidebar-brand-full" width="118" height="46" alt="{{ config('app.name') }} Logo"></a>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('dashboard') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg>
                Dashboard</a></li>

        @if(auth()->user()->hasRole('admin'))
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.course.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-newspaper') }}"></use>
                    </svg>
                    Course Management
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.chapter.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library') }}"></use>
                    </svg>
                    Chapter Management
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.lesson.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-excerpt') }}"></use>
                    </svg>
                    Lesson Management
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                    </svg>
                    Users Management
                </a>
            </li>
        @endif


    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
