<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang=""> <!--<![endif]-->
@include('visitor.DashboardFreeWifi.layout.head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('aditional-styles')
<body>
    @include('visitor.DashboardFreeWifi.layout.navbar')

    <div class="main" style="position: absolute; left: 0px;" >
    @include('visitor.DashboardFreeWifi.layout.sidebar')

    </div>
    <div class="right" style="  margin-left:19%; margin-top: 2%;padding-right: 5%; ">
        <br><br><br>
        @yield('content')
    </div>

    @include('visitor.DashboardFreeWifi.layout.footer')
<script src="{{ asset('js/app.js') }}"></script>
@include('visitor.DashboardFreeWifi.layout.scripts')

@yield('aditional-scripts')
</body>
</html>
