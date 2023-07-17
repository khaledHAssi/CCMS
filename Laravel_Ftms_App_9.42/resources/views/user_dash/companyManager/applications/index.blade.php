@extends('user_dash.companyManager.master')

@section('title', 'All Applications')

@section('content')

    <div class="content pt-3">
        <div class="container-fluid">
            <div class="card">
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
                            <div style="display: flex;" class="mb-2">
                            <button id="UnAnsweredBtn" class=" btn btn-warning">UnAnswered <i class="fas fa-eye"></i></button>
                            <button id="AcceptedBtn" class="ml-2 btn btn-success">Accepted <i class="fas fa-eye"></i></button>
                            <button id="RejectedBtn" class="ml-2 btn btn-danger">Rejected <i class="fas fa-eye"></i></button>
                        </div>
                            {{-- ------------------- Unanswered applications -------------------- --}}
                            @php
                                $statusNullCount = $applications->where('status', '===', null)->count();
                            @endphp

                            <tr class="bg-warning text-white">
                                <td colspan="12" class="text-center text-bold">UnAnswered applications - it count :
                                    {{ $statusNullCount }}</td>
                            </tr>

                            @if ($statusNullCount === 0)
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($applications as $application)
                                    @if ($application->status === null)
                                    <tr class="UnAnswered">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->company->name }}</td>
                                            <td>{{ $application->course->name }}</td>
                                            <td>{{ $application->reason }}</td>
                                            <td>
                                                <form class="d-inline" action="{{ route('user_dash.cmaccept') }}"
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
                                                <a href="{{ route('user_dash.cmreject', $application->id) }}"
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
                                <td colspan="12" class="text-center text-bold">Accepted Applications - it count :
                                    {{ $status1Count }}</td>
                            </tr>

                            @if ($status1Count === 0)
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($applications as $application)
                                    @if ($application->status == 1)
                                    <div>
                                        <tr class="Accepted" style="display: none">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->company->name }}</td>
                                            <td>{{ $application->course->name }}</td>
                                            <td>{{ $application->reason }}</td>
                                            <td>
                                                <a href="{{ route('user_dash.cmrestore', $application->id) }}"
                                                    onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-trash-restore mr-1"></i>
                                                    UnAccept
                                                </a>
                                            </td>
                                        </tr>
                                    </div>
                                    @endif
                                @endforeach
                            @endif

                            {{-- ------------------- rejected applications -------------------- --}}
                            @php
                                $status0Count = $applications->where('status', '0')->count();
                            @endphp

                            <tr class="bg-danger text-white">
                                <td colspan="12" class="text-center text-bold">rejected applications - it count :
                                    {{ $status0Count }}</td>
                            </tr>

                            @if ($status0Count === 0)
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($applications as $application)
                                    @if ($application->status === 0)
                                        <tr class="Rejected" style="display: none">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            <td>{{ $application->company->name }}</td>
                                            <td>{{ $application->course->name }}</td>
                                            <td>{{ $application->reason }}</td>
                                            <td>
                                                <a href="{{ route('user_dash.cmrestore', $application->id) }}"
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#AcceptedBtn').on('click', function() {
        $('.Accepted').toggle();
    });
        $('#UnAnsweredBtn').on('click', function() {
        $('.UnAnswered').toggle();
    });
        $('#RejectedBtn').on('click', function() {
        $('.Rejected').toggle();
    });
    </script>
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
