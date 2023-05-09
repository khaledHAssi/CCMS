@extends('admin.master')

@php
    $title = "Site Settings"
@endphp

@section('title', $title)

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $title }}</h1>
            <form action="{{ route('admin.settings_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="logo">Logo</label>
                    <input id="logo" name="logo" type="file" class="form-control @error('logo') is-invalid @enderror " />
                    @error('logo')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <img src="{{ asset( settings()->get('logo') ) }}" width="200" alt="">
                </div>

                <div class="mb-3">
                    <label for="footer_logo">Footer Logo</label>
                    <input id="footer_logo" name="footer_logo" type="file" class="form-control @error('footer_logo') is-invalid @enderror " />
                    @error('footer_logo')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <img src="{{ asset( settings()->get('footer_logo') ) }}" width="200" alt="">
                </div>

                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input id="mail" name="mail" type="mail" placeholder="mail" class="form-control @error('mail') is-invalid @enderror " value="{{ old('mail', settings()->get('mail')) }}" />
                    @error('email')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>


                <button class="btn btn-success px-5"><i class="fas fa-save"></i> Save</button>

            </form>
        </div>
    </div>
  </div>
</div>

@stop

@section('scripts')
<script>
    // function readURL(input) {

    // }

    $('input[type=file]').on('change', function(e) {

        // console.log(e.target);

        if (e.target.files && e.target.files[0]) {

            let inp = $(this)
            var reader = new FileReader();

            reader.onload = function (e) {
                // console.log(inp);
                inp.next('img').attr('src', e.target.result).width(150);
            };

            reader.readAsDataURL(e.target.files[0]);
        }
    })
</script>
@stop
