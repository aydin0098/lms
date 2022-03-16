<!doctype html>
<html lang="fa">
@include('front.layouts.head')
<body >
@include('front.layouts.header')
@yield('content')
@include('front.layouts.footer')
<div class="overlay"></div>
@include('front.layouts.scripts')
</body>
</html>
