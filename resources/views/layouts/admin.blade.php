<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BackSpaceDev') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('admin/css/admin.css') }}" rel="stylesheet">
</head>

<body>
    @include('includes.admin.topnav')

    <div id="wrapper" class="toggled admin-wrapper">

        @include('includes.admin.sidenav')
        
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('includes.admin.errors')
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('admin/js/admin.js') }}" defer></script>
    @yield('scripts')
</body>

</html>