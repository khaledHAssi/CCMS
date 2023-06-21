@extends('user_dash.doctor.master')

@section('title', 'Companies')
<style>
    .widget-user .widget-user-image>img {
        border: 3px solid #fff !important;
        height: 130px !important;
        width: 150px !important;
        position: relative;
        top: 4em !important;
        right: 2em !important;
    }

    .widget-user .widget-user-header {
        border-top-left-radius: 0.25rem !important;
        border-top-right-radius: 0.25rem !important;
        height: 250px !important;
        padding: 1rem !important;
        text-align: center !important;
    }
</style>
@section('content')
    <!-- DataTables -->
    <div class="col-lg-12">

        @if (session('msg'))
            <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
        @endif
        <!-- Widget: user widget style 1 -->
        <!-- /.widget-user -->





        <!-- DataTables -->
        {{-- <script src="{{asset('adminassets/plugins/datatables/jquery.dataTables.min.js')}}"></script> --}}
        {{-- <script src="{{asset('adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script> --}}
        {{-- <script src="{{asset('adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> --}}
        {{-- <script src="{{asset('adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> --}}

        <!-- page script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @stop
