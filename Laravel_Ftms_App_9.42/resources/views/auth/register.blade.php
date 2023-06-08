@extends('layouts.app')

@section('content')

<body class="bg-gradient-primary" dir="ltr">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-xl-block">
                        <img style="height: 110%;line-height: "
                            src="{{ asset('siteassets/imgFinanza/Sign up-rafiki.png') }}"
                            class="img-fluid rounded-circle img-bordered-sm ">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            required autocomplete="name" autofocus
                                            class="form-control form-control-user form-control @error('name') is-invalid @enderror"
                                            id="exampleFirstName" placeholder="Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                            required autocomplete="phone" autofocus
                                            class="form-control form-control-user @error('phone') is-invalid @enderror"
                                            id="phone" placeholder="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input id="email" type="text" name="email" value="{{ old('email') }}"
                                            required autocomplete="email" autofocus
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="email" placeholder="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="username" type="text" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            id="username" placeholder="UserName">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <input id="password" type="password" name="password"
                                            value="{{ old('password') }}" required autocomplete="password" autofocus
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            placeholder="Repeat Password"id="password-confirm"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                                <hr>
                                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>
                            <hr>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a style="text-decoration: none"
                                        href="{{ route('password.request') }}" class="small">
                                        {{ __('Forgot Password') }}?
                                    </a>
                            </div>
                            @endif
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('bootstrapAssets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrapAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('bootstrapAssets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('bootstrapAssets/js/sb-admin-2.min.js') }}"></script>

</body>
@endsection
