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
                        <h3 class="card-title">Create </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.evaluationAnswer.store')}}">
                    <form>
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-ban"></i>validation error</h5>

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        </div>
                        @endif
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

                            <div class="form-group">
                                <label>select your evaluation</label>
                                <select class="custom-select" name="evaluation_id">
                                    @foreach ($evaluation as $eval)
                                          <option value="{{ $eval->id }}">{{ $eval->id}} - {{ $eval->title}}</option>
                                    @endforeach
                                    </select>



                              </div>
                            <div class="form-group">
                                <label for="title">reason</label>
                                <input type="text" class="form-control" name="reason" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="title">answer_type</label>
                                <input type="number" class="form-control" name="answer_type" placeholder="Enter question">
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
