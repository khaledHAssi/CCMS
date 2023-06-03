@extends('admin.master')

@php
    $title = "Edit Users"
@endphp

@section('title', $title)

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $title }}</h1>
            <form action="{{ route('admin.users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
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
                    @endif
                </div>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text"  class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $user->name) }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Edit Img</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="user_image">
                            <label class="custom-file-label" for="exampleInputFile">Choose img</label>
                            @error('user_image')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password">password</label>
                    <input id="password" name="password" type="text"  class="form-control @error('password') is-invalid @enderror " value="{{ old('password') }}" />
                    @error('password')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="type">Type</label>
                    {{-- ['student', 'companyManager', 'companySupervisor', 'doctor', 'super-admin'] --}}
                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                        <option @selected($user->type == 'student' || old('type') == 'student') value="student">Student</option>
                        <option @selected($user->type == 'companySupervisor' || old('type') == 'companySupervisor') value="companySupervisor">CompanySupervisor</option>
                        <option @selected($user->type == 'companyManager' || old('type') == 'companyManager') value="companyManager">CompanyManager</option>
                        <option @selected($user->type == 'super-admin' || old('type') == 'super-admin') value="super-admin">SuperAdmin</option>
                        <option @selected($user->type == 'doctor' || old('type') == 'doctor') value="doctor">Doctor</option>
                    </select>
                    @error('type')
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

                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" @if ($user->status == 1)
                    checked
                    @endif class="custom-control-input" id="status" name="status">
                    <label class="custom-control-label" for="status">User Active Status</label>
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

    <script src="{{ asset('adminassets\plugins\bs-custom-file-input\bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

@stop


