

@include('backend.layouts.header')

@include('backend.layouts.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->


    </div>
    @include('backend.layouts.footer')

            @stack('scripts')
</body>
</html>

