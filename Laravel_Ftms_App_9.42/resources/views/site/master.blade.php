<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="{{asset('siteassets/imgFinanze/favicon.ico')}}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('siteassets/lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('siteassets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('siteassets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('siteassets/css/owl.theme.default.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('siteassets/css/style.css') }}">

    <title>@yield('title', config('app.name'))</title>

    <style>
        .blog-post img {
            height: 300px;
            object-fit: contain;
        }

        .blog-post .content p {
            min-height: 55px;
        }
    </style>

    @yield('styles')

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
      <!-- Spinner Start -->
      <div id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
  </div>
    <!-- TOP NAV -->
    {{-- <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i> info@example.com</p>
                    <p> <i class='bx bxs-phone-call'></i> 123 456-7890</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                </div>
            </div>
        </div>
    </div> --}}
       <!-- Navbar Start -->
       <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>9.00 am - 9.00 pm</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>info@example.com</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+012 345 6789</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ route('ftms.index') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1  class="display-5 text-primary m-0">Finanza</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('ftms.index') }}" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="project.html" class="dropdown-item">Projects</a>
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="team.html" class="dropdown-item">Team Member</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    @if (!Auth::check())
                    <a href="{{route('login')}}"class="nav-item nav-link">Login</a>
                @else

                    {{-- <a href="{{ route('logout') }}" data-bs-toggle="modal"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                        class="nav-item nav-link" >
                        <i class="fas fa-sign-out-alt mr-2" ></i>Logout</a> --}}
                        <a href="{{ route('ftms.site_profile') }}" class="nav-item nav-link" >
                        Profile
                    </a>
                @endif

                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-facebook-f text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-twitter text-primary"></small>
                    </a>
                    <a class="btn btn-light btn-sm-square rounded-circle ms-3" href="">
                        <small class="fab fa-linkedin-in text-primary"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- BOTTOM NAV -->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                </ul>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="btn btn-brand ms-lg-3">Contact</a>





            </div>
        </div>
    </nav> --}}

    @yield('content')

  <!-- Copyright Start -->
  <div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a
                href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>


    {{-- <!-- --------------------------------------------------- Modal--------------------------------------------------------- -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url({{ asset('siteassets/img/c2.jpg') }}); min-height:300px;">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3">
                                    <div>
                                        <h1>Get in touch</h1>
                                        <p>Fell free to contact us and we will get back to you as soon as possible</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">First name</label>
                                        <input type="text" class="form-control" placeholder="Jon" id="userName"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="userName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" placeholder="Doe" id="userName"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-12">
                                        <label for="userName" class="form-label">Email address</label>
                                        <input type="email" class="form-control" placeholder="Johndoe@example.com"
                                            id="userName" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleInputEmail1" class="form-label">Enter Message</label>
                                        <textarea name="" placeholder="This is looking great and nice." class="form-control" id=""
                                            rows="4"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-brand">Send Message</button>
                                    </div>
                                    <div class="col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                                            class="btn btn-brand ms-lg-3">Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
{{-- ------------------------------EndOurLastModal -------------------------------------------------------}}
    <!-- ---------------------------------------------------OurLastLoginModal--------------------------------------------------------- -->
    {{-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url({{ asset('siteassets/img/c2.jpg') }}); min-height:300px;">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div>
                                        <h1>Login</h1>
                                        <p>Sign in and complete your fun journey</p>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Enter Your Email Address</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" id="email" aria-describedby="emailHelp">
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="exampleInputEmail1" class="form-label">Enter Your Password</label>
                                        <input type="password" name="password" autocomplete="new-password"
                                            aria-describedby="emailHelp" class="form-control">
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <button type="submit" class="btn btn-brand">Login</button>
                                    </div>

                                    <div class="col-10">
                                        @if (Route::has('password.request'))
                                            <a style="color: var(--brand);" href="{{ route('password.request') }}">
                                                {{ __('forgot password') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="btn btn-brand ms-lg-3" style="width: 100%">{{ __('Register') }}</a>
                                        @endif
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    {{-- ------------------------------------------End Our Last Model --}}

    <!-- --------------------------------------------------- Register Modal--------------------------------------------------------- -->
    {{-- <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url({{ asset('siteassets/img/c2.jpg') }}); min-height:300px;">
                                <div>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3">
                                    @csrf

                                    <div>
                                        <h1>Register</h1>
                                        <p>Register and join us for free</p>
                                    </div>
                                    <div class="col-6">
                                        <label for="reg_name" class="form-label">{{ __('Name') }}</label>
                                        <input id="reg_name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="reg_username" class="form-label">{{ __('Username') }}</label>
                                        <input id="reg_username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="reg_phone" class="form-label">{{ __('Phone') }}</label>
                                        <input id="reg_phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                        @error('phone')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="reg_email" class="form-label">{{ __('Email Address') }}</label>
                                        <input id="reg_email" type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelp" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="reg_password" class="form-label">{{ __('password') }}</label>
                                        <input id="reg_password" type="password" name="password" required autocomplete="new-password"
                                            aria-describedby="passwordHelp" class="form-control @error('password') is-invalid @enderror">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                                            aria-describedby="confirmpasswordHelp" class="form-control">
                                    </div>

                                    <div class="col-2">
                                        <button type="submit" class="btn btn-brand">{{ __('Register') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

    <script src="{{ asset('siteassets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('siteassets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('siteassets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('siteassets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('siteassets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('siteassets/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('siteassets/js/main.js')}}"></script>

    @yield('scripts')
</body>

</html>
