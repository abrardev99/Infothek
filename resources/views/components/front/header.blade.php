<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <form method="GET" action="{{ url('/') }}">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input value="{{ request()->get('q') }}" name="q" type="search" class="form-control form-input" placeholder="Search anything..."
                               autofocus>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
