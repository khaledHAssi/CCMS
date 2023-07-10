@extends('admin.master')

@section('title', 'All Applications')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">

                    <h1>All Application</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>User</th>
                                <th>Company</th>
                                <th>Course</th>
                                <th>Reason</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- ------------------- Unanswered applications -------------------- --}}
                            @php
                                $statusNullCount = $applications->where('status', '===', null)->count();
                            @endphp

                            <tr class="bg-warning text-white">
                                <td colspan="12" class="text-center text-bold">Unanswered applications - count it :
                                    {{ $statusNullCount }}</td>
                            </tr>

                            @if ($statusNullCount === 0)
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($applications as $application)
                                    @if ($application->status === null)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->company->name }}</td>
                                            <td>{{ $application->course->name }}</td>
                                            <td>{{ $application->reason }}</td>
                                            <td>

                                                <form class="d-inline" action="{{ route('admin.applications.accept') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="text" hidden id="course_id"
                                                        value="{{ $application->course_id }}" name="course_id" />
                                                    <input type="text" hidden id="user_id"
                                                        value="{{ $application->user_id }}" name="user_id" />
                                                    <input type="text" hidden id="application_id"
                                                        value="{{ $application->id }}" name="application_id" />

                                                    <button onclick="return confirm('Are you sure!?')"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-check-circle mr-1"></i>accept
                                                    </button>
                                                </form>

                                                <a href="{{ route('admin.applications.reject', $application->id) }}"
                                                    onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-danger btn-sm"><i
                                                        class="fas fa-times-circle mr-1"></i>reject</a>

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                            

                            {{-- ------------------- accepted applications -------------------- --}}
                            @php
                                $status1Count = $applications->where('status', 1)->count();
                            @endphp

                            <tr class="bg-success text-white">
                                <td colspan="12" class="text-center text-bold">accepted applications - count it :
                                    {{ $status1Count }}</td>
                            </tr>

                            @if ($status1Count === 0)
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($applications as $application)
                                    @if ($application->status == 1)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->company->name }}</td>
                                            <td>{{ $application->course->name }}</td>
                                            <td>{{ $application->reason }}</td>
                                            <td>
                                                <a href="{{ route('admin.applications.restore', $application->id) }}"
                                                    onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-trash-restore mr-1"></i>
                                                    delete from course
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif


                            
                            {{-- ------------------- regected applications -------------------- --}}
                            @php
                                $status0Count = $applications->where('status', '0')->count();
                            @endphp

                            <tr class="bg-danger text-white">
                                <td colspan="12" class="text-center text-bold">regected applications - count it :
                                    {{ $status0Count }}</td>
                            </tr>

                            @if ($status0Count === 0)
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($applications as $application)
                                    @if ($application->status === 0)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->company->name }}</td>
                                            <td>{{ $application->course->name }}</td>
                                            <td>{{ $application->reason }}</td>
                                            <td>
                                                <a href="{{ route('admin.applications.restore', $application->id) }}"
                                                    onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-undo mr-1"></i>
                                                    Restore
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

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
