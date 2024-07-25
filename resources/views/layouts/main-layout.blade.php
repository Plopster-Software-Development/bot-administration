<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <title>Create User</title>
</head>

<body>
    @include('layouts.components.top-bar')
    @include('layouts.components.user-nav')
    <div class="page-wrapper">
        @include('layouts.components.navbar')
        <div class="page-content">
            @yield('page-content')
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Parsley js -->
    <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/pages/jquery.validation.init.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>