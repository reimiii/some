<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('assets.css')

    <title>Guru | @yield('title')</title>
</head>

<body>


<!--start wrapper-->
<div class="wrapper">

    <!--start sidebar -->
@include('guru.layout.sidebar')
<!--end sidebar -->

    <!--start top header-->
@include('guru.layout.header')
<!--end top header-->


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                @yield('breadcrumb')
                <div class="ms-auto">
                    @yield('action')
                </div>
            </div>
            <!--end breadcrumb-->


            @yield('guru_content')
        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->


    <!--start footer-->
{{--    @include('guru.layout.footer')--}}
<!--end footer-->


    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->


</div>
<!--end wrapper-->


<!-- JS Files-->
@include('assets.js')

</body>

</html>