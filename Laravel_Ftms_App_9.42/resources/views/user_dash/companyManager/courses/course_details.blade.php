@extends('user_dash.master')

@section('title', 'Companies')

@section('content')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

            <table class="table table-bordered">
            <h1>Your Company</h1>

            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Expert name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                        {{--
                                ********************************
                                        student_name
                                        email
                                        phone
                                        created_at
                                ********************************
                        --}}

                        <tr>
                            {{-- <td>{{ $loop->index + 1}}</td> --}}
                            {{-- <td>{{ $student->name }}</td> --}}
                            {{-- <td>{{ $student->email }}</td> --}}
                            {{-- <td>{{ $student->phone }}</td> --}}
                            {{-- <td>{{ $student->created_at }}</td> --}}
                            <td>
                                {{-- <a href="{{ route('user_dash.cmCompany.details', $company->id) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a> --}}
                            </td>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="{{asset('adminassets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('adminassets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
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
