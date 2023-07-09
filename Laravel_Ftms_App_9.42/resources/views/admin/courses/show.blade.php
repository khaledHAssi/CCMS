@extends('admin.master')

@section('title', $course->name . ' Course')

@section('content')
    <style>
        .Headers4 {
            margin-left: 0px;
            margin-right: 10px;
            font-weight: 600;
        }

        .Headers5 {
            margin-left: 0px;
            margin-top: 1.1% !important;
        }
    </style>
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">

                    <div class="container-xxl py-5 ">
                        <div class="container">

                            <div class="row g-4 align-items-end mb-4 flex">
                                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <img class="img-circle " height="400" width="400"
                                        src="{{ Storage::url($course->image) }}" alt="user image">
                                </div>
                                <div class="col-lg-6 wow fadeInUp details" style="position: relative;top:-2em;bottom: 1em;"
                                    data-wow-delay="0.3s">
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Name: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->name }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Company: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->company->name }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Status: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->status }}

                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Supervisor: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->supervisor->name }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Start date: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->start_date }}

                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">End date: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->end_date }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Student Count: </h4>
                                        <h5 class="Headers5">
                                            @php
                                                $courseStudentsCount = $course->course_students->count();
                                            @endphp
                                            {{ $courseStudentsCount }}
                                        </h5>
                                    </div>
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link fw-semi-bold active text-bold" id="nav-story-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-story" type="button"
                                                role="tab" aria-controls="nav-story"
                                                aria-selected="true">Description</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                            aria-labelledby="nav-story-tab">
                                            <p class="Headers5">
                                                {{ $course->description }}
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Mark</th>
                                <th>Note</th>
                                <th>Added at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->course_students as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->pivot->student_mark }}</td>
                                    <td>{{ $student->pivot->note }}</td>
                                    <td>{{ $student->pivot->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal{{ $student->pivot->id }}"> <i class="fas fa-edit"></i> </a>

                                        <a href="{{ route('admin.courses.delete_student', $student->pivot->id) }}"
                                            class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                                    </td>

                                        {{-- ------------------------------- Update Modal------------------------------------ --}}

                                    <div class="modal fade" id="updateModal{{ $student->pivot->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $student->pivot->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <!-- Modal header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalLabel{{ $student->pivot->id }}">Update Course</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <!-- Add form fields or inputs for updating the row data -->
                                                    <div class="form-group">
                                                        <label for="student_mark{{ $student->pivot->id }}">Student Mark:</label>
                                                        <input type="number" class="form-control" id="student_mark" name="student_mark{{ $student->pivot->id }}" value="{{$student->pivot->student_mark  }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="note{{ $student->pivot->id }}">Note:</label>
                                                        <textarea class="form-control" id="note{{ $student->pivot->id }}" name="note">{{ $student->pivot->note  }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="updateRowData({{ $course->id }})">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- ------------------------------- Update ------------------------------------ --}}
    {{-- <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">
                        Update Student
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.courses.delete_student', $student->pivot->id) }}" method="POST">
                    @csrf

                    <div class="modal-body">

                        <!-- ----------------------Student Mark--------------------- -->
                        <div class="mb-3">
                            <label for="update_student_mark" class="form-label">Student Mark</label>
                            <input type="number" class="form-control mb-2" id="update_student_mark"
                                placeholder="Student Mark" />
                        </div>
                        <!-- ---------------------- Note --------------------- -->

                        <div class="mb-3">
                            <label for="update_note" class="form-label">Note</label>
                            <input type="text" class="form-control mb-2" id="update_note" placeholder="Student Mark" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeUpdateModal">
                            Close
                        </button>
                        <button type="button" class="btn btn-warning">
                            update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}

    <!-- jQuery -->
    <script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('adminassets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

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

            function updateRowData(courseId) {
                // Get the updated values from the form inputs
                var studentMark = document.getElementById('student_mark'.courseId).value;
                var note = document.getElementById('note'.courseId).value;
                
                // Make an Axios request to update the row data
                axios.put('/update-row-data', {
                    courseId: courseId,
                    studentMark: studentMark,
                    note: note
                })
                .then(function(response) {
                    // Handle the success response
                    console.log(response.data);
                    // Close the modal or perform any other actions
                    $('#updateModal' + courseId).modal('hide');
                })
                .catch(function(error) {
                    // Handle the error response
                    console.log(error);
                    // Display an error message or perform any other error handling
                });
            }

        // function update_student() {

        //     axios.post(`/admin/edit_student`, {
        //             id: document.getElementById('coure_id').value,
        //             student_mark: document.getElementById('student_mark').value,
        //             note: document.getElementById('note').value
        //         })
        //         .then(function(response) {
        //             if (response.data.data.errors != null) {
        //                 var errors = response.data.data.errors;
        //                 for (var key in errors) {
        //                     Toast.fire({
        //                         icon: response.data.status,
        //                         title: errors[key][0],
        //                     });
        //                 }
        //             } else {
        //                 showMessage('success', response.data.message);
        //                 window.location.reload();
        //             }

        //         })
        //         .catch(function(error) {
        //             Toast.fire({
        //                 icon: 'error',
        //                 title: error.message,
        //             });
        //             console.log(error);
        //         })

        // }
    </script>
@stop
