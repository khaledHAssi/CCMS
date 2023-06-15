@extends('user_dash.companyManager.master')

@php
    $title = "Edit Expert"
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
            <form action="{{ route('user_dash.cmExperts.update', $expert) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $expert->name) }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Edit Img</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Choose img</label>
                        </div>
                    </div>
                </div>





                <div class="mb-3">
                    <label for="doctor_id">Expert id</label>
                    <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                        @foreach ($doctors as $doctor)
                            <option  @selected($doctor->id==$expert->doctor_id) value="{{ $doctor->id }}">{{ $doctor->id . ' - ' . $doctor->name }}</option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>




                <div class="mb-3">
                    <label for="hour_price">Hour price</label>
                    <input id="hour_price" name="hour_price" type="text" placeholder="Name" class="form-control @error('hour_price') is-invalid @enderror " value="{{ old('hour_price', $expert->hour_price) }}" />
                    @error('hour_price')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

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
