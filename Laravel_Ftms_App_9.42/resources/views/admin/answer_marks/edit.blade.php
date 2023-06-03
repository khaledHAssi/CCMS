@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Answer marks</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.answer_marks.update' , $Answer_mark) }}">
                        @method('PUT') {{-- لان الفورم لا يدعم البوت --}}
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> validation errors</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                              </div>
                            @endif
                            <div class="mb-3">
                                <label for="answer_id">Answer</label>
                                <select name="answer_id"id="answer_id" class="form-control @error('answer_id') is-invalid @enderror">
                                    @foreach ($answers as $answer)

                                    <option @selected($Answer_mark->id==$answer->id) value="{{$answer->id}}">{{$answer->id .' - '. $answer->solution}}</option>
                                    @endforeach
                                </select>
                                @error('task_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="student_mark">student_mark</label>
                                <input type="student_mark" class="form-control" name="student_mark" id="student_mark"
                                value="{{old('student_mark') ?? $Answer_mark->student_mark}}"    placeholder="student_mark">
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
*
</section>
@endsection
