@extends('admin.master')

@php
    $title = "Add user"
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
            <form action="{{ route('user_dash.cmUsers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name') }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username">username</label>
                    <input id="username" name="username" type="text" placeholder="User Name" class="form-control @error('username') is-invalid @enderror " value="{{ old('username') }}" />
                    @error('username')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">email</label>
                    <input id="email" name="email" type="text" placeholder="User email" class="form-control @error('email') is-invalid @enderror " value="{{ old('email') }}" />
                    @error('email')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone">phone</label>
                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror " value="{{ old('phone') }}" />
                    @error('phone')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror "  />
                </div>



                <div class="form-group">
                    <label for="exampleInputFile">Add Img</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="user_image" @error('user_image') is-invalid @enderror>
                            <label class="custom-file-label" for="exampleInputFile">Choose Img</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="type">Type</label>
                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                      {{-- access --}}
                      <option @selected(old('type') == 'companySupervisor') value="companySupervisor">CompanySupervisor</option>
                      {{-- access --}}
                        <option @selected(old('type') == 'doctor') value="doctor">Doctor</option>
                    </select>
                    @error('type')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                </div>
                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input"id="status"name="status">
                    <label class="custom-control-label" for="status">User Active Status</label>
                </div>

                <button class="btn btn-success px-5"><i class="fas fa-save"></i> Add</button>





            </form>
        </div>
    </div>
  </div>
</div>
@section('scripts')
    <script src="{{ asset('adminassets\plugins\bs-custom-file-input\bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection

@stop


