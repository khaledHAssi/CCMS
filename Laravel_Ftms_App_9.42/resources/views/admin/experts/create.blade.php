@extends('admin.master')

@php
    $title = 'Add Expert';
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
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i>validation error</h5>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">
                    <h1>{{ $title }}</h1>
                    <form action="{{ route('admin.experts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" placeholder="Name"
                                class="form-control @error('name') is-invalid @enderror " />
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Add Img</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose img</label>
                                </div>
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="company_id">Company id</label>
                            <select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->id . ' - ' . $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="doctor_id">Expert id</label>
                            <select name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror">
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->id . ' - ' . $doctor->name }}</option>
                                @endforeach
                            </select>
                            @error('doctor_id')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="hour_price">Hour Price</label>
                            <input id="hour_price" name="hour_price" type="numeric" placeholder="Enter your hour price "
                                class="form-control @error('hour_price') is-invalid @enderror " />
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
