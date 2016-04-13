</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="/assets/admin/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/assets/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>


@if(Request::is('admin'))
{{--<!-- Morris Charts JavaScript -->--}}
<script src="/assets/admin/bower_components/raphael/raphael-min.js"></script>
<script src="/assets/admin/bower_components/morrisjs/morris.min.js"></script>
<script src="/assets/admin/js/morris-data.js"></script>

@else
<script src="/assets/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
@endif

<!-- include summernote css/js-->
<link rel="stylesheet" href="/assets/admin/dist/css/summernote.css">
<script src="/assets/admin/dist/js/summernote.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/assets/admin/dist/js/sb-admin-2.js"></script>
<!-- Bootstrap Datepicker -->
<script type="text/javascript" src="/assets/admin/dist/js/bootstrap-datepicker.js"></script>
<!-- Confirm Delete -->
<script src="/assets/admin/dist/js/bootstrap-confirm-delete.js"></script>
<!-- Select 2-->
<script src="/assets/admin/dist/js/select2.min.js"></script>
<!-- Bootstrap TimePciker -->
<script src="/assets/admin/dist/js/bootstrap-timepicker.min.js"></script>
<!-- File Upload Bootsnip -->
<script src="/assets/admin/dist/js/custom.js"></script>
<!-- Bootstrap Form Helpers -->
<script src="/assets/admin/dist/js/bootstrap-formhelpers.js"></script>
<!-- Toaster -->
<script src="/assets/admin/dist/js/toastr.min.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "closeButton": true,
        "positionClass": "toast-bottom-right",
        "progressBar": true,
        "preventDuplicates": true,
    };
</script>
{!! Toastr::render() !!}


<!-- Bootstrap-Iconpicker Iconset for Glyphicon -->
<script type="text/javascript" src="/assets/admin/dist/js/iconset/iconset-all.min.js"></script>

<!-- Bootstrap-Iconpicker -->
<script type="text/javascript" src="/assets/admin/dist/js/bootstrap-iconpicker.min.js"></script>
<script src="https://js.pusher.com/3.0/pusher.min.js"></script>
@include('layouts.confirm_deletion')
@yield('scripts')
</body>

</html>
