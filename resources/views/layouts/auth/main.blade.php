<!DOCTYPE html>
<html>
@include('layouts.auth.head')

<body class="light-version">
    {{-- @include('layouts.header') --}}
    @yield('body')
    @include('layouts.auth.footer')
</body>

</html>