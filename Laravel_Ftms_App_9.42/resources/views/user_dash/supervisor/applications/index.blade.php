@extends('user_dash.supervisor.master')

@section('title', 'All Applications')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

            <h1>All Application</h1>
            <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Company Id</th>
                        <th>User Id</th>
                        <th>Course Id</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($applications as $application)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $application->company_id }}</td>
                            <td>{{ $application->user_id }}</td>
                            <td>{{ $application->course_id }}</td>
                            <td>{{ $application->reason }}</td>
                            <td>{{ $application->status }}</td>
                            <td>
                                <form class="d-inline" action="#" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure!?')" class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i></button>
                                </form>
                                <a href="#" class="btn btn-success btn-sm"> <i class="fas fa-check-circle"></i> </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

@stop
