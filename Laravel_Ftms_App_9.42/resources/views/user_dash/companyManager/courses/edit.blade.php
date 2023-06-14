@extends('user_dash.companyManager.master')

@php
    $title = "Edit Course"
@endphp

@section('title', $title)

@section('styles')

<style>
    .questions_wrapper div {
    position: relative;
}

.questions_wrapper div span {
    width: 20px;
    height: 20px;
    background: #333;
    display: flex;
    justify-content: center;
    /* align-items: center; */
    color: #fff;
    font-size: 36px;
    line-height: 14px;
    border-radius: 50px;
    cursor: pointer;
    position: absolute;
    right: 8px;
    top: 8px;
    display: none;
}

.questions_wrapper div:hover span {
    display: flex;
}
.questions_wrapper div span:hover {
    background: #f00;
}

</style>

@stop

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $title }}</h1>
            <form action="{{ route('user_dash.cmCourses.update', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $course->name) }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Edit Img</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="course_image">
                            <label class="custom-file-label" for="exampleInputFile">Choose img</label>
                        </div>
                    </div>
                </div>



                <div class="mb-3">
                    <label for="supervisor_id">SuperVisor Id</label>
                    <select name="supervisor_id" class="form-control @error('supervisor_id') is-invalid @enderror">
                        @foreach ($users as $user)
                        <option @selected($user->id==$course->supervisor_id) value="{{$user->id}}">{{$user->id .' - '. $user->name}}</option>
                        @endforeach
                    </select>
                    @error('supervisor_id')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>




                <div class="mb-3">
                    <label for="description">Description</label>
                    <input id="description" name="description" type="text" placeholder="Name" class="form-control @error('description') is-invalid @enderror " value="{{ old('description', $course->description) }}" />
                    @error('description')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>


                <div class="mb-3">
                    <label for="start_date">Start Date</label>
                    <input id="start_date" name="start_date" type="date" placeholder="Name" class="form-control @error('start_date') is-invalid @enderror " value="{{ old('start_date', $course->start_date) }}" />
                    @error('start_date')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="end_date">End Date</label>
                    <input id="end_date" name="end_date" type="date" placeholder="Name" class="form-control @error('end_date') is-invalid @enderror " value="{{ old('end_date', $course->end_date) }}" />
                    @error('end_date')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if ($course->status == 1)
                    checked
                    @endif class="custom-control-input" id="status" name="status">
                    <label class="custom-control-label" for="status">Course Active Status</label>
                </div>




                <button class="btn btn-success px-5"><i class="fas fa-save"></i> Edit</button>

            </form>
        </div>
    </div>
  </div>
</div>

@stop


@section('scripts')


    <script src="{{ asset('adminassets\plugins\bs-custom-file-input\bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

@stop
