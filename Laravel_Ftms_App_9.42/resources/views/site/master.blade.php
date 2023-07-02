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

       <!-- Navbar Start -->
       <div class="container-fluid  px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>{{env('APP_LOCATION')}}</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>{{env('APP_SCHEDULE')}}</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>{{env('APP_CONTACT_EMAIL')}}</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-primary me-2"></i>+{{env('APP_CONTACT_PHONE')}}</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ route('ftms.index') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1  class="display-5 text-primary m-0" style="font-size:1em">CorpratesCoursesManagmentSystem</h1>
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


    @yield('content')

  <!-- Copyright Start -->
  <div class="container-fluid copyright py-4">
    <div class="container">
            <div class="text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="border-bottom" href="#">{{env('APP_NAME')}}</a>, All Right Reserved.
        </div>
    </div>
</div>



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
