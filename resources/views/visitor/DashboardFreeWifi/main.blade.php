<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang=""> <!--<![endif]-->
@include('visitor.DashboardFreeWifi.head')
<body>
    @include('visitor.DashboardFreeWifi.navbar')

    <div class="main" style="position: absolute; left: 0px;" >
    @include('visitor.DashboardFreeWifi.sidebar')

    </div>
    <div class="right" style="  margin-left:19%; margin-top: 2%;padding-right: 5%; ">
            @yield('content')
    </div>

    @include('visitor.DashboardFreeWifi.footer')
<script src="{{ asset('js/app.js') }}"></script>
@include('visitor.DashboardFreeWifi.scripts')
</body>
</html>
