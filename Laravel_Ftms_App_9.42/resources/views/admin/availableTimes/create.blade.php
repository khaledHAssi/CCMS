@extends('admin.master')

@php
    $title = 'Add AvailableTime';
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
                    <form action="{{ route('admin.AvailableTimes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="link">Meet Link</label>
                            <input id="link" name="link" type="text" placeholder="Link"
                                class="form-control @error('link') is-invalid @enderror " />
                            @error('link')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>




                        <div class="mb-3">
                            <label for="expert_id">Expert id</label>
                            <select name="expert_id" class="form-control @error('expert_id') is-invalid @enderror">
                                @foreach ($experts as $expert)
                                    <option value="{{ $expert->id }}">{{ $expert->id . ' - ' . $expert->name }}</option>
                                @endforeach
                            </select>
                            @error('expert_id')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>






                        <div class="mb-3">
                            <label for="date">Date</label>
                            <input id="date" name="date" type="date" placeholder="Enter your hour price "
                                class="form-control @error('date') is-invalid @enderror " />
                            @error('date')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="hour_from">Hour From</label>
                            <input id="hour_from" name="hour_from" type="time" placeholder="Enter your hour price "
                                class="form-control @error('hour_from') is-invalid @enderror " />
                            @error('hour_from')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="hour_to">Hour to</label>
                            <input id="hour_to" name="hour_to" type="time" placeholder="Enter your hour price "
                                class="form-control @error('hour_to') is-invalid @enderror " />
                            @error('hour_to')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label for="price">Hour Price</label>
                            <input id="price" name="price" type="text" placeholder="Your Hour Price"
                                class="form-control @error('price') is-invalid @enderror " />
                            @error('price')
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
