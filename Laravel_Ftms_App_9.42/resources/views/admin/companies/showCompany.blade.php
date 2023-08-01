@extends('admin.master')

@section('title', $company->name . ' Course')

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
    <div class="content py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <div class="container-xxl">
                        <div class="container">
                            <div class="row g-4 align-items-center mb-4 flex">
                                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="d-flex justify-content-center">
                                        <img class="img-thumbnail" width="450" src="{{ asset($company->image) }}"
                                            alt="user image">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <p class="text-warning">
                                            {{ $company->status }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 wow fadeInUp details" style="position: relative;top:-2em;bottom: 1em;"
                                    data-wow-delay="0.3s">
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Name: </h4>
                                        <h5 class="Headers5">
                                            {{ $company->name }}
                                        </h5>
                                    </div>
                                    <div style="display:block;">
                                        <h4 class="Headers4">Description: </h4>
                                        <p class="Headers5">
                                            {{ Str::words(strip_tags($company->description), 10, '...') }}
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>ID</th>
                                    <th>Coures image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($company->courses as $courses)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img class="img-circle img-bordered-sm" height="65" width="65"
                                                src="{{ Storage::url($courses->image) }}" alt="course image"></td>
                                        <td>{{ $courses->name }}</td>
                                        <td class="small">{{ $courses->description }}</td>
                                        <td>
                                            <a href="{{route('admin.showCourse',$courses->id)}}" class="btn btn-warning btn-sm"  style="margin-left: 5px"> <i class="fas fa-info-circle"></i> </a>
                                    </td>
                                        {{-- <td>{{ $student->company_id }}</td> --}}
                                        {{-- <td>{{ $student->supervisor_id }}</td> --}}
                                        {{-- @if ($student->pivot->student_mark)
                                        <td>{{ $student->pivot->student_mark }}</td>
                                    @else
                                        <td class="text-danger">No Mark</td>
                                    @endif
                                    @if ($student->pivot->note)
                                        <td>{{ $student->pivot->note }}</td>
                                    @else
                                        <td class="text-danger">No Note</td>
                                    @endif
                                    <td>{{ $student->pivot->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#updateModal"
                                            onclick="add_data('{{ $student->pivot->id }}', '{{ $student->pivot->student_mark }}', '{{ $student->pivot->note }}')">
                                            <i class="fas fa-edit"></i> </a>

                                        <a href="{{ route('admin.courses.delete_student', $student->pivot->id) }}"
                                            class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                                    </td> --}}

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

        {{-- ------------------------------- Update Modal------------------------------------ --}}

        {{-- <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Modal header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="c_s_mark">Student Mark:</label>
                            <input type="number" class="form-control" id="c_s_mark">
                        </div>
                        <div class="form-group">
                            <label for="c_s_note">Note:</label>
                            <textarea class="form-control" id="c_s_note"></textarea>
                        </div>
                        <input hidden type="text" id="c_s_id">
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                        <button type="button" class="btn btn-primary" onclick="updateRowData({{ $company->id }})">Save
                            changes</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- jQuery -->
        {{-- <script src="{{ asset('adminassets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('adminassets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}

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
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script>
            // const Toast = Swal.mixin({
            //     toast: true,
            //     position: 'top-end',
            //     showConfirmButton: false,
            //     timer: 3000,
            //     timerProgressBar: true,
            //     didOpen: (toast) => {
            //         toast.addEventListener('mouseenter', Swal.stopTimer)
            //         toast.addEventListener('mouseleave', Swal.resumeTimer)
            //     }
            // })

            // function showMessage(icon, message) {
            //     Swal.fire({
            //         icon: icon,
            //         title: message,
            //         showConfirmButton: false,
            //         timer: 3500
            //     });
            // }


            // @if (session('msg'))
            //     Toast.fire({
            //         icon: '{{ session('status') }}',
            //         title: '{{ session('msg') }}'
            //     })
            // @endif

            // function add_data(courseId, studentMark, studentNote) {
            //     // Set the values in the form fields
            //     document.getElementById("c_s_mark").value = studentMark;
            //     document.getElementById("c_s_note").value = studentNote;
            //     document.getElementById("c_s_id").value = courseId;
            // }

            // function updateRowData() {
            //     var studentMarkElement = document.querySelector('#c_s_mark');
            //     var studentNoteElement = document.querySelector('#c_s_note');
            //     var studentIdElement = document.querySelector('#c_s_id');

            //     var student_Mark = studentMarkElement ? studentMarkElement.value : '';
            //     var student_Note = studentNoteElement ? studentNoteElement.value : '';
            //     var student_Id = studentIdElement ? studentIdElement.value : '';
            //     console.log(student_Mark + ' - ' + student_Note + ' - ' + student_Id);


            //     axios.put('/admin/edit_student', {
            //             course_id: student_Id,
            //             student_mark: student_Mark,
            //             note: student_Note
            //         })
            //         .then(function(response) {
            //             console.log(response.data);
            //             showMessage(response.data.status, response.data.message);
            //             window.location.reload();
            //             // $('#updateModal').modal('hide');
            //         })
            //         .catch(function(error) {
            //             console.log(error);
            //             showMessage(response.data.status, error.message);

            //         });
            // }
        </script>
    @stop
