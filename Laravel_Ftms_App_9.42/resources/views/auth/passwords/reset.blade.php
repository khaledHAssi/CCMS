@extends('layouts.app')


@section('content')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img style="margin: 2em;position: relative;top: 01.3em"
                                    src="{{ asset('siteassets/imgFinanza/Forgot password-rafiki.png') }}"
                                    class="img-fluid rounded-circle img-bordered-sm ">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">


                                    </div>
                                    <form method="POST" class="user" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">


                                        <div class="form-group">
                                                 <input id="email" type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus>
                                                <br>
                                                <input id="password" placeholder="New password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                <br>
                                                <input placeholder="Confirm password" id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>


                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already have an account?
                                            Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{{ asset('bootstrapAssets/vendor/jquery/jquery.min.js') }}"></script>
    {{-- Core plugin JavaScript --}}

    <script src="{{ asset('bootstrapAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    {{-- Custom scripts for all pages --}}
    <script src="{{ asset('bootstrapAssets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('bootstrapAssets/js/sb-admin-2.min.js') }}"></script>

</body>
@endsection


