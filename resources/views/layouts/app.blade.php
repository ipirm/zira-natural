<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
@include('default.head')
<body>
<div class="wrapper">
    @include('default.header')
    @yield('content')
    @include('default.footer')
    @include('default.scripts')
</div>
</body>
</html>
