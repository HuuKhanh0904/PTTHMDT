<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.master.header')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.master.navigation')
        <!-- Left navbar-header -->
        @include('admin.master.left-navbar-header')
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @include('admin.master.dashboard')
                {{-- row --}}
                @yield('content')
                {{-- end row --}}
                <!-- .right-sidebar -->
                @include('admin.master.right-sidebar')
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            @include('admin.master.footer')
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('admin.master.js')
</body>

</html>
