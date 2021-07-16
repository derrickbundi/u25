<!DOCTYPE html>
<html lang="en">
@include('layouts.dashboard.head')

<body>
    <div class="main-wrapper">
        @include('layouts.dashboard.header')
        <div class="page-wrapper">
            <div class="page-content">
                @yield('body')
            </div>
            @include('layouts.dashboard.footer')
        </div>
    </div>
    @yield('scripts')
    @include('layouts.dashboard.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        @if(Session::has('success'))
        toastr.options.positionClass = 'toast-bottom-left';
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.options.positionClass = 'toast-bottom-left';
        toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options.positionClass = 'toast-bottom-left';
        toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options.positionClass = 'toast-bottom-left';
        toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>

</html>