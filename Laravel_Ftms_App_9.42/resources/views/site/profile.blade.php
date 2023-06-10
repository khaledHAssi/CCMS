<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link href="{{ asset('siteassets/imgFinanze/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('siteassets/lib/animate/animate.min.css') }}" rel="stylesheet">

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

        .socialDetails {
            font-size: 30px;
            background-color: rgba(128, 128, 128, 0.104);
            border-radius: 50px;
            color: blue;
        }
        .container{
            display: flex ! important ; 
        }
        .details{
            margin-left: 0em !important;
            
        }
    </style>

    @yield('styles')

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <div class="container-fluid px-0 wow fadeIn " data-wow-delay="0.1s">
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
                <h1 class="display-5 text-primary m-0">Finanza</h1>
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
                        <a href="{{ route('login') }}"class="nav-item nav-link">Login</a>
                    @else
                        <a href="{{ route('logout') }}" data-bs-toggle="modal"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                class="nav-item nav-link" >
                        </i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
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


    <!-- SLIDER -->
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center">

                <div class="container-xxl py-5 ">
                    <div class="container">
                        <div class="row g-4 align-items-end mb-4 ">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <img class="img-fluid float-right rounded-3 mb-3" style="height: 600px;"
                                    src="{{ Storage::url(Auth::user()->image) }}" alt="">
                            </div>
                            <div class="col-lg-6 wow fadeInUp details" data-wow-delay="0.3s">
                                <div style="display:flex;">
                                    <h4 -  style="margin-left:0px;">Name:</h4>
                                    <h5 style="margin-left:0px;margin-top: 1.5% ">
                                         - {{ Auth::user()->name }}
                                    </h5>
                                </div>
                                <div style="display:flex;">
                                    <h4 -  style="margin-left:0px;">Email:</h4>
                                    <h5 style="margin-left:0px;margin-top: 1.5% ">
                                         - {{ Auth::user()->email }}
                                    </h5>
                                </div>
                                <div style="display:flex;">
                                    <h4 -  style="margin-left:0px;">Phone: </h4>
                                    <h5 style="margin-left:0px;margin-top: 1.5% ">
                                         - +{{ Auth::user()->phone }}
                                    </h5>
                                </div>
                                <div class="social">
                                    <h4 style="margin-bottom: 14px;">Social Midea</h4>
                                    @if (Auth::user()->profile == null)
                                        <h6 class="text-danger">Your profile is not completed </h6>
                                    @else
                                        <a href="{{ Auth::user()->profile->fb ?? '' }}">
                                            <i style="font-size: 30px; background-color: rgba(128, 128, 128, 0.104);border-radius: 50px;   color: blue;"
                                                class="bx bxl-facebook"></i></a>
                                        <a href="{{ Auth::user()->profile->tw ?? '' }}"><i
                                                style=""class="bx bxl-twitter socialDetails"></i></a>
                                        <a href="{{ Auth::user()->profile->in ?? '' }}"><i
                                                class=" socialDetails bx bxl-instagram"></i></a>
                                        <a href="{{ Auth::user()->profile->li ?? '' }}"><i
                                                class=" socialDetails bx bxl-linkedin"></i></a>
                                </div>
                                    @endif
                                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3" style="margin-top: 15px">Edit</p>
                                <div class="border rounded p-4">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link fw-semi-bold active" id="nav-story-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-story" type="button"
                                                role="tab" aria-controls="nav-story"
                                                aria-selected="true">Story</button>
                                            <button class="nav-link fw-semi-bold" id="nav-mission-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-mission" type="button"
                                                role="tab" aria-controls="nav-mission"
                                                aria-selected="false">Mission</button>
                                            <button class="nav-link fw-semi-bold" id="nav-vision-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-vision" type="button"
                                                role="tab" aria-controls="nav-vision"
                                                aria-selected="false">Vision</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                            aria-labelledby="nav-story-tab">
                                            <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                                Aliqu diam
                                                amet diam et eos labore.</p>
                                            <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam
                                                et eos labore.
                                                Clita erat ipsum et lorem et sit</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav-mission" role="tabpanel"
                                            aria-labelledby="nav-mission-tab">
                                            <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                                Aliqu diam
                                                amet diam et eos labore.</p>
                                            <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam
                                                et eos labore.
                                                Clita erat ipsum et lorem et sit</p>
                                        </div>
                                        <div class="tab-pane fade" id="nav-vision" role="tabpanel"
                                            aria-labelledby="nav-vision-tab">
                                            <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit.
                                                Aliqu diam
                                                amet diam et eos labore.</p>
                                            <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam
                                                et eos labore.
                                                Clita erat ipsum et lorem et sit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row g-4">
                                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="h-100">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                <i class="fa fa-times text-white"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h4>No Hidden Cost</h4>
                                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                            </div>
                                            <div class="border-end d-none d-lg-block"></div>
                                        </div>
                                        <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="h-100">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                <i class="fa fa-users text-white"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h4>Dedicated Team</h4>
                                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                            </div>
                                            <div class="border-end d-none d-lg-block"></div>
                                        </div>
                                        <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="h-100">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                <i class="fa fa-phone text-white"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h4>24/7 Available</h4>
                                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>




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
    <script src="{{ asset('siteassets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/app.js') }}"></script>
</body>

</html>
