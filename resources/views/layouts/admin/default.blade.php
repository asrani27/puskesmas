<!DOCTYPE html>
<html lang="en">
        @include('layouts.admin.head')
<body class="hold-transition layout-top-nav">
<div class="wrapper">
        @include('layouts.admin.navbar')
<div class="content-wrapper">
        @yield('content-header')
<div class="content">
        @yield('content')
</div>
</div>
        @include('layouts.admin.footer')
</div>
        @include('layouts.admin.js')
</body>
</html>
