<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/app/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PLN Investment Day 2024 | @yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    @include('includes.style')
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <!-- /Logo -->
        <div class="authentication-inner row m-0">
            <!-- Left Text -->
            @hasSection('background')
                @yield('background')
            @else
                <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center bg-image" style="background:url('{{ asset('jeneponto.jpg') }}'); background-repeat:no-repeat; background-size:cover; background-position: center center;">
                </div>
            @endif
            <!-- /Left Text -->

            <!--  Multi Steps Registration -->
            @yield('content')
            <!-- / Multi Steps Registration -->
        </div>
    </div>

    <script>
        // Check selected custom option
        window.Helpers.initCustomOptionCheck();
    </script>

    <!-- / Content -->

    @include('includes.script')
</body>

</html>
