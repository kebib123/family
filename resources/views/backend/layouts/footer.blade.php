<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Next Nepal</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<!-- jQuery -->
<script src="{{url('js/app.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $(document).ready(function() {
        $('#example-1').DataTable();
    } );
</script>

<script src="{{url('js/adminlte.min.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('title');
    CKEDITOR.replace('desc');
    CKEDITOR.replace('abc');
    CKEDITOR.replace('des');

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
      toastr.success("{{Session::get('success')}}");
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
    toastr.error("{{Session::get('error')}}");
    @endif



</script>
