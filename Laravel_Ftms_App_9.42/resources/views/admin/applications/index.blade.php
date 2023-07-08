@extends('admin.master')

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

                                <form class="d-inline" action="{{ route('admin.applications.accept') }}" method="POST">
                                    @csrf
                                    <input type="text" hidden id="course_id" value="{{$application->course_id}}" name="course_id"/>
                                    <input type="text" hidden id="user_id" value="{{$application->user_id}}" name="user_id"/>
                                    <input type="text" hidden id="application_id" value="{{$application->id}}" name="application_id"/>

                                    <button onclick="return confirm('Are you sure!?')" class="btn btn-success btn-sm">
                                        <i class="fas fa-check-circle mr-1"></i>accept
                                    </button>
                                </form>

                                <a href="{{ route('admin.applications.reject', $application->id) }}"  class="btn btn-danger btn-sm"><i class="fas fa-times-circle mr-1"></i>reject</a>

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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (session('msg'))
            Toast.fire({
                icon: '{{ session('status') }}',
                title: '{{ session('msg') }}'
            })
        @endif
    </script>
@stop
