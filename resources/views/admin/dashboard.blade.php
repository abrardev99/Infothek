<x-app-layout :title="'Dashboard'">
    <div class="row">
        <div class="col-sm-6 col-md-2">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="text-muted text-right mb-4">
                        <svg class="c-icon c-icon-2xl">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user-follow') }}"></use>
                        </svg>
                    </div>
                    <div class="text-value-lg">{{ $totalCustomers ?? 0 }}</div><small class="text-muted text-uppercase font-weight-bold">Total Customers</small>
                    <div class="progress progress-white progress-xs mt-3">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
