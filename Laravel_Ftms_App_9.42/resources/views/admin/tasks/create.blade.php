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
                        <h3 class="card-title">Create Task</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{ route('admin.tasks.store')}}">
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
                                <label for="company_id">Company Id</label>
                                <select name="company_id"id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    @foreach ($companies as $company)

                                    <option  value="{{$company->id}}">{{$company->id .' - '. $company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="course_id">Course Id</label>
                                <select name="course_id"id="course_id" class="form-control @error('course_id') is-invalid @enderror">
                                    @foreach ($courses as $course)

                                    <option  value="{{$course->id}}">{{$course->id .' - '. $course->name}}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>


                        <div class="form-group">
                            <label for="Question">Question</label>
                            <input type="text" class="form-control" name="question" placeholder="Enter question">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                               <label for="main_mark">Main Mark</label>
                               <input type="number" class="form-control" name="main_mark" placeholder="Enter main_mark">
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
