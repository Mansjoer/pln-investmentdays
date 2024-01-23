<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/app/assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PLN Investment Days 2024 | Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    @include('includes.style')
</head>

<body>
    <!-- Content -->

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a role="button" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="https://i.imgur.com/FRLa22C.png" alt="" style="width: 150px">
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-2">

                        @livewire('login-form')

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    @include('includes.script')
</body>

</html>
