@extends('admin.master')

@section('content')
<section class="content">
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

                    <form method="POST" action="{{ route('admin.answer_marks.store')}}">
                    <form>
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
                                <label for="answer_id">Answer id</label>
                                <select name="answer_id"id="answer_id" class="form-control @error('answer_id') is-invalid @enderror">
                                    @foreach ($answers as $answer)

                                    <option  value="{{$answer->id}}">{{$answer->id .' - '. $answer->solution}}</option>
                                    @endforeach
                                </select>
                                @error('answer_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>



                        <div class="form-group">
                            <label for="student_mark">Student Marks</label>
                            <input type="number" class="form-control" name="student_mark" placeholder="Enter student_mark">
                        </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
