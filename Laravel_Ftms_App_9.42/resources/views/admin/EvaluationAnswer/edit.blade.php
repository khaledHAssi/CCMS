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
                        <h3 class="card-title">Edit Answers</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.evaluationAnswer.update' , $evaluationAnswer->id ) }}">
                        @method('PUT') {{-- لان الفورم لا يدعم البوت --}}
                        @csrf
                        <div class="card-body">

                    @if (session('msg'))
                    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                @endif
                            <div class="form-group">
                                <label>select your evaluation</label>
                                <select class="custom-select" name="evaluation_id">
                                    @foreach ($evaluation as $eval)
                                          <option @selected($eval->id) value="{{ $eval->id }}">{{ $eval->title}} - {{ $eval->id}}</option>
                                    @endforeach
                                    </select>
                                    @error('evaluation_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                  @enderror
                              </div>
                            <div class="form-group">
                                <label for="reason">reason</label>
                                <input type="text" class="form-control" name="reason" id="reason "
                                value="{{old('reason') ?? $evaluationAnswer->reason}}"    placeholder="Enter reason">
                                @error('reason')
                                <small class="invalid-feedback">{{ $message }}</small>
                              @enderror
                            </div>

                            <div class="form-group">
                                <label for="answer_type">answer_type</label>
                                <input type="number" class="form-control" name="answer_type" id="answer_type"
                                value="{{old('answer_type') ?? $evaluationAnswer->answer_type}}"    placeholder="answer_type">

                            @error('answer_type')
                            <small class="invalid-feedback">{{ $message }}</small>
                          @enderror
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
