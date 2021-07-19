<!DOCTYPE html>
<html lang="en-US" class="" data-skin="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
@include('layouts.head')

<body
    class="home page-template page-template-elementor_header_footer page page-id-1242 ekit-hf-header ekit-hf-footer ekit-hf-template-vinkmag ekit-hf-stylesheet-vinkmag-child body-inner-content box-shadow-enebled sidebar-active light elementor-default elementor-template-full-width elementor-kit-4206 elementor-page elementor-page-1242">
    {{-- <div id="preloader" class="hidden">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
        <div class="preloader-cancel-btn-wraper">
            <a href="#" class="btn btn-primary preloader-cancel-btn">
                Cancel Preloader </a>
        </div>
    </div> --}}
    @include('layouts.header')
    @yield('body')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('scripts')
</body>

</html>