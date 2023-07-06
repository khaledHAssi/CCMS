@extends('user_dash.supervisor.master')

@section('title', 'Courses')

@section('content')
<style>
    .Headers4 {
    margin-left:0px;margin-right:10px;
    font-weight: 600;
}
.Headers5
{
    margin-left:0px;margin-top: 1.1%!important;
}
</style>
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

            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Added at</th>
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
                            <div class="container-xxl py-5 ">
                                <div class="container">
                            <h1>Your Course</h1>
                                <br>
                                    <div class="row g-4 align-items-end mb-4 flex">

                                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                           <img class="img-circle " height="400" width="400"
                                    src="{{ Storage::url($course->image) }}" alt="user image">
                                        </div>
                                        <div class="col-lg-6 wow fadeInUp details" style="position: relative;top:-2em;bottom: 1em;" data-wow-delay="0.3s">
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Name: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->name}}
                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Company: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->company_id}} -
                                                        {{$company->name}}
                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Status: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->status}}

                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Supervisor: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->supervisor_id}} - {{Auth::user()->name}}
                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Description: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->description}}

                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Start date: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->start_date}}

                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">End date: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->end_date}}
                                                </h5>
                                            </div>
                                            <div style="display:flex;">
                                                <h4 class="Headers4">Student Count: </h4>
                                                <h5 class="Headers5">
                                                    35
                                                </h5>
                                            </div>


                                            <!-- Button trigger modal -->


                                            </div>
                                        </div>
                                    </div>
                                    <td>1</td>
                                    <td>Mohammed</td>
                                    <td>Mohd@gmail.com</td>
                                    <td>972597246383</td>
                                    <td>2024-11-15</td>
                                </div>

                                {{-- <td>{{ $loop->index + 1}}</td> --}}
                                {{-- <td>{{ $student->name }}</td> --}}
                            {{-- <td>{{ $student->email }}</td> --}}
                            {{-- <td>{{ $student->phone }}</td> --}}
                            {{-- <td>{{ $student->created_at }}</td> --}}
                            <td>
                                {{-- <a href="{{ route('user_dash.cmExperts.destroy', $student->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a> --}}
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
