@extends('admin.master')

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add answers</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="{{ route('admin.answers.store') }}">
                            @csrf
                            <div class="card-body">

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i> validation errors</h5>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label for="task_id">Task id</label>
                                    <select name="task_id"id="task_id"
                                        class="form-control @error('task_id') is-invalid @enderror">
                                        @foreach ($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->id . ' - ' . $task->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('task_id')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="user_id">User id</label>
                                    <select name="user_id"id="user_id"
                                        class="form-control @error('user_id') is-invalid @enderror">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->id . ' - ' . $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="solution">solution</label>
                                    <input type="text" class="form-control" name="solution" placeholder="Enter solution">
                                </div>

                                <div class="form-group">
                                    <label for="student_mark">Student Marks</label>
                                    <input type="number" class="form-control" name="student_mark"
                                        placeholder="Enter student mark">
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
