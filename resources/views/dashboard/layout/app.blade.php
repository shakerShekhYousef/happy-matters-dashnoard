<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Happy matters - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> --}}
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico"> --}}

    @include('dashboard.layout.style')
    @yield('style')

</head>

<body data-topbar="colored">
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('dashboard.layout.header')
        @include('dashboard.layout.leftSideMenu')

        <div class="main-content">
            <div class="page-content">
                @if (Session::has('message'))
                    <div class="alert alert-success"> {{ session::get('message') }}</div>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $item)
                        <div class="alert alert-danger"> {{ $item }}</div>
                    @endforeach
                @endif
                {{-- @if (Session::has('errors') && is_array($errors))
                @elseif (Session::has('errors') && !is_array(Session::has('errors')))
                    <div class="alert alert-danger"> {{ Session::get('errors') }}</div>
                @endif --}}
                <div class="container-fluid mt-4">
                    @yield('content')
                    <!-- end page content-->

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            @include('dashboard.layout.footer')

        </div>

    </div>
    <!-- END layout-wrapper -->

    {{-- @include('dashboard.layout.rightSideMenu') --}}
    <div class="rightbar-overlay"></div>
    @include('dashboard.layout.scripts')
    @yield('scripts')
</body>

</html>
