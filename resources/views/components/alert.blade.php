<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "200",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    //listen livewire events

    window.addEventListener('success', event => {
        toastr["success"](event.detail.message)
    })

    window.addEventListener('error', event => {
        toastr["error"](event.detail.message)
    })

    window.addEventListener('info', event => {
        toastr["info"](event.detail.message)
    })

    window.addEventListener('warning', event => {
        toastr["warning"](event.detail.message)
    })

    @if(session()->has('success'))
        toastr["success"]("{{ session('success') }}")
    @endif

        @if(session()->has('error'))
        toastr["error"]("{{ session('error') }}")
    @endif

        @if(session()->has('info'))
        toastr["info"]("{{ session('info') }}")
    @endif

        @if(session()->has('warning'))
        toastr["warning"]("{{ session('warning') }}")
    @endif


</script>
