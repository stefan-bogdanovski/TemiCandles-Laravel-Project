<!DOCTYPE html>
<html lang="en">
@include('fixed.head')
<body id="home_page" class="home_page">
@if(request()->routeIs('cart.index'))
    @include('fixed.purchase_modal')
@endif
    @include('fixed.header')

    @include('fixed.nav')

    @yield('slider')

    @yield('content')

    @include('fixed.footer')
    @include('fixed.scripts')
</body>
</html>
