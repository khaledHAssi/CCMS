@extends('admin.master')

@php
    $title = "Edit Company"
@endphp

@section('title', $title)

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $title }}</h1>
            <form action="{{ route('admin.companies.update', $company) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $company->name) }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="image">Image</label>
                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror " />
                    @error('image')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                    <img width="80" src="{{ asset($company->image) }}" alt="">
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="myeditor">{{ old('description', $company->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="location">Location</label>
                    <input id="location" name="location" type="text" placeholder="Location" class="form-control @error('location') is-invalid @enderror " value="{{ old('location', $company->location) }}" />
                    @error('location')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-success px-5"><i class="fas fa-save"></i> Add</button>

            </form>
        </div>
    </div>
  </div>
</div>

@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    tinymce.init({
        selector: '.myeditor'
    })
</script>
@stop
