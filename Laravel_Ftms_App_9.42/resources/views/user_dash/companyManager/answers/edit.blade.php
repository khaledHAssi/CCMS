@extends('admin.master')

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit answers</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.answers.update', $answer->id) }}">
                            @method('PUT') {{-- لان الفورم لا يدعم البوت --}}
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
                                        class="form-control">
                                        @foreach ($tasks as $task)
                                            <option @selected($task->id == $answer->task_id) value="{{ $task->id }}">
                                                {{ $task->id . ' - ' . $task->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="user_id">User id</label>
                                    <select name="user_id"id="user_id"
                                        class="form-control">
                                        @foreach ($users as $user)
                                            <option @selected($user->id == $answer->user_id) value="{{ $user->id }}">
                                                {{ $user->id . ' - ' . $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="solution">solution</label>
                                    <input type="solution" class="form-control" name="solution" id="solution"
                                    value="{{ old('solution') ?? $answer->solution }}" placeholder="solution">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="student_mark">student_mark</label>
                                    <input type="student_mark" class="form-control" name="student_mark" id="student_mark"
                                    value="{{ old('student_mark') ?? $answer->student_mark }}"
                                    placeholder="student mark">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Edit</button>
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
