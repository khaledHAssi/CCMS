@extends('layouts.app')

@section('content')
<body>

    <!--Hey! This is the original version
of Simple CSS Waves-->

    <div class="header">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block  ">
                                <img src="{{ asset('siteassets/imgFinanza/Authentication-rafiki.png') }}"
                                    class="img-fluid rounded-circle img-bordered-sm ">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" autocomplete="off" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label>{{ __('Email') }}</label>
                                            <input type="email"name="email" value="{{ old('email') }}"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">

                                            @error('email')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>{{ __('Password') }}</label>
                                            <input type="password" name="password"
                                                class="form-control form-control-user" id="password"
                                                placeholder="Password">

                                            @error('password')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('تذكرني') }}
                                            </label>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                         {{__('Login')}}
                                        </button>
                                        <hr>
                                        {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
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
                                            <a style="text-decoration: none"
                                                href="{{ route('register') }}" class="small">
                                                {{ __('SignUp') }}?
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>




        <script src = "{{ asset('bootstrapAssets/vendor/jquery/jquery.min.js') }}" ></script>
        {{-- Core plugin JavaScript --}}

    <script src="{{ asset('bootstrapAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    {{-- Custom scripts for all pages --}}
    <script src="{{ asset('bootstrapAssets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('bootstrapAssets/js/sb-admin-2.min.js') }}"></script>

</body>

@endsection
