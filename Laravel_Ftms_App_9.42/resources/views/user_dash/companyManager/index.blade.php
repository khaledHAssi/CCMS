@extends('user_dash.companyManager.master')

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
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-white" style="background: url('{{ asset($company->image) }}') center center;">
                <section class="bg-black text-white" style="opacity:70% ; padding: 1em;">
                    <div class="container bold " style="text-align:left">
                        <h3 class="widget-user-username" style="font-weight: bold; ">
                            {{ $company->name }} <span>Company</span>
                            </h3>
                        <h5 class="widget-user-desc" style="margin-top: .5em; font-size: 1em"><span style="display: block;font-weight: bold;">Description :</span>
                            {{ Str::words(strip_tags($company->description), 10, '...') }}
                        </h5>
                    </div>
                </section>

            </div>
            <div class="widget-user-image"height="38" width="38">
                <img height="38" width="38" class="img-circle img-bordered-sm elevation-2"
                    src="{{ Storage::url(Auth::user()->image) }}" alt="User Avatar">
            </div>
            <br>
            <br>
            <div class="text-center block" style="width: 100%">
                <div class="container">
                    {!! $company->location !!}
                </div>
            </div>
            <br>

        </div>
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
