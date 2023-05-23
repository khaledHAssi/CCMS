@extends('admin.master')

@php
    $title = "Edit Students"
@endphp

@section('title', $title)

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $title }}</h1>
            <form action="{{ route('admin.students.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text"  class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $user->name) }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>



                <div class="mb-3">
                    <label for="phone">phone</label>
                    <input id="phone" name="phone" type="text"  class="form-control @error('phone') is-invalid @enderror " value="{{ old('phone', $user->phone) }}" />
                    @error('phone')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="username">username</label>
                    <input id="username" name="username" type="text"  class="form-control @error('username') is-invalid @enderror " value="{{ old('username', $user->username) }}" />
                    @error('username')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="status">status</label>
                    <input id="status" name="status" type="text"  class="form-control @error('status') is-invalid @enderror " value="{{ old('status', $user->status) }}" />
                    @error('status')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>




                <div class="mb-3">
                    <label for="name">Email</label>
                    <input id="email" name="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror " value="{{ old('email', $user->email) }}" />
                    @error('email')
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.1/tinymce.min.js" integrity="sha512-eV68QXP3t5Jbsf18jfqT8xclEJSGvSK5uClUuqayUbF5IRK8e2/VSXIFHzEoBnNcvLBkHngnnd3CY7AFpUhF7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    tinymce.init({
        selector: '.myeditor'
    })
</script>
@stop
