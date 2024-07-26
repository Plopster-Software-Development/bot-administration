<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <title>{{ __($subtitle) ?? 'Login' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="account-body">
    <div class="row vh-100">
        <div class="col-lg-3  pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">
                    <div class="px-3">
                        <div class="media">
                            <a href="index.html" class="logo logo-admin"><img src="{{ asset('assets/images/logo-sm-128.png') }}" height="55" alt="logo" class="my-3"></a>
                            <div class="media-body ml-3 align-self-center">
                                <h4 class="mt-0 mb-1">{{ __($subtitle) ?? '' }}</h4>
                                <p class="text-muted mb-0">{{ __($subdescription) }}</p>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                    @yield('content-box')
                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0 d-flex justify-content-center">
            <div class="accountbg d-flex align-items-center">
                <div class="account-title text-white text-center">
                    <img src="{{ asset('assets/images/logo-sm-128.png') }}" alt="" class="thumb-sm">
                    <h4 class="mt-3"> {{__('Welcome To '. env('APP_NAME')) }}</h4>
                    <div class="border w-25 mx-auto border-primary"></div>
                    <h1 class="">Let's Get Started</h1>
                    <p class="font-14 mt-3">{{ __($description) ?? '' }} <a href="{{ url($route) ?? '#'}}" class="text-primary">{{__($action) ?? ''}}</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>