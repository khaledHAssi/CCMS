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

        .container {}

        .details {
            margin-left: 0em !important;

        }

        .Information {
            margin-left: 0px;
            margin-top: .8%;
        }
    </style>

    @yield('styles')

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>


    <!-- Navbar Start -->
    <div class="container-fluid  px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ env('APP_LOCATION') }}</small>
                <small class="ms-4"><i class="fa fa-clock text-primary me-2"></i>{{ env('APP_SCHEDULE') }}</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-primary me-2"></i>{{ env('APP_CONTACT_EMAIL') }}</small>
                <small class="ms-4"><i
                        class="fa fa-phone-alt text-primary me-2"></i>+{{ env('APP_CONTACT_PHONE') }}</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ route('ftms.index') }}" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="display-5 text-primary m-0" style="font-size:1em">CorpratesCoursesManagmentSystem</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('ftms.index') }}" class="nav-item nav-link active">Home</a>
                </div>
                @if (!Auth::check())
                    <a href="{{ route('login') }}"class="nav-item nav-link">Login</a>
                @else
                    <a href="{{ route('logout') }}" data-bs-toggle="modal"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                        class="nav-item nav-link">
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
                        <div class="row g-4 align-items-end mb-4 flex ">

                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                @if (Auth::user()->image)
                                    <img class="img-fluid float-right rounded-3 mb-3" style="height: 500px;"
                                        src="{{ Storage::url(Auth::user()->image) }}" alt="">
                                @else
                                    <img class="img-fluid float-right rounded-3 mb-3" style="height: 300px;"
                                        src="{{ asset('siteassets/imgFinanza/userImage.png') }}" alt="">

                                    <div class="alert alert-warning" role="alert" style="width: 58%;">
                                        Please <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#settingProfile" class="alert-link">upload</a> your
                                        profile picture.
                                    </div>
                                @endif


                            </div>
                            <div class="col-lg-6 wow fadeInUp details" data-wow-delay="0.3s">
                                <div style="display:flex;">
                                    <h4 - style="margin-left:0px;">Name:</h4>
                                    <h5 class="Information">
                                        - {{ Auth::user()->name }}
                                    </h5>
                                </div>
                                <div style="display:flex;">
                                    <h4 - style="margin-left:0px;">Email:</h4>
                                    <h5 class="Information">
                                        - {{ Auth::user()->email }}
                                    </h5>
                                </div>
                                <div style="display:flex;">
                                    <h4 - style="margin-left:0px;">Phone: </h4>
                                    <h5 class="Information">
                                        - +{{ Auth::user()->phone }}
                                    </h5>
                                </div>
                                <div class="social">
                                    <h4 style="margin-bottom: 14px;">Social media</h4>

                                    @if (Auth::user()->profile == null)
                                        <h6 class="text-danger">Your profile is not completed </h6>
                                    @else
                                        @if (Auth::user()->profile->fb != null)
                                            <a href="{{ Auth::user()->profile->fb ?? '' }}">
                                                <i style="font-size: 30px; background-color: rgba(128, 128, 128, 0.104);border-radius: 50px;   color: blue;"
                                                    class="bx bxl-facebook"></i></a>
                                        @endif
                                        @if (Auth::user()->profile->tw != null)
                                            <a href="{{ Auth::user()->profile->tw ?? '' }}"><i
                                                    style=""class="bx bxl-twitter socialDetails"></i></a>
                                        @endif
                                        @if (Auth::user()->profile->in != null)
                                            <a href="{{ Auth::user()->profile->in ?? '' }}"><i
                                                    class=" socialDetails bx bxl-instagram"></i></a>
                                        @endif
                                        @if (Auth::user()->profile->li != null)
                                            <a href="{{ Auth::user()->profile->li ?? '' }}"><i
                                                    class=" socialDetails bx bxl-linkedin"></i></a>
                                        @endif
                                </div>
                                @endif
                                <!-- Button trigger modal -->

                                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3"
                                    style="margin-top: 15px" data-bs-toggle="modal" data-bs-target="#settingProfile">
                                    Edit</p>
                                <div class="border rounded p-4">

                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link fw-semi-bold active" id="nav-story-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-story" type="button"
                                                role="tab" aria-controls="nav-story"
                                                aria-selected="true">Bio</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                            aria-labelledby="nav-story-tab">
                                            @if (Auth::user()->profile == null)
                                                <p class="mb-0 text-danger">Your profile is not completed</p>
                                            @else
                                                @if (Auth::user()->profile->bio != null)
                                                    <p class="mb-0">{{ Auth::user()->profile->bio }}</p>
                                                @else
                                                    <p class="mb-0 text-warning">Please enter your profile Bio</p>
                                                @endif

                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row g-4">
                                <nav class="navbar-circle bg-primary">
                                    <div class="container-fluid" style="display:flex;justify-content: space-around">
                                        <span class="navbar-text text-white text-bold">
                                            your courses
                                        </span>
                                    </div>
                                </nav>
                                @forelse ($user->student_courses as $course)
                                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="h-100">
                                            <div class="d-flex">
                                                <div class="border-end d-none d-lg-block"></div>

                                                @if ($course->image !== null)
                                                    <td>
                                                        <img class="img-circle img-bordered-sm img-profile"
                                                            width="30%" src="{{ Storage::url($course->image) }}"
                                                            alt="course image">
                                                    </td>
                                                @else
                                                    <td>
                                                        <div style="margin-left: 3em !important; position: relative; top: 1em;  right: 1.7em;"
                                                            class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                            <i class="fas fa-graduation-cap text-white"></i>
                                                        </div>
                                                    </td>
                                                @endif
                                                <div class="ps-3">
                                                    <h4>{{ $course->name }}</h4>
                                                    <a href="{{ route('ftms.course', $course->id) }}"
                                                        class="mr-10 btn btn-outline-primary btn-sm">go
                                                        to course <i class="far fa-arrow-alt-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                        </div>
                                    </div>
                                @empty

                                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                        <div class="h-100">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                    <i class="fa fa-users text-white"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h4 class="text-danger">you don,t have any course</h4>
                                                    {{-- <span>Clita erat ipsum lorem sit sed stet duo justo</span> --}}
                                                </div>
                                                <div class="border-end d-none d-lg-block"></div>
                                            </div>
                                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                        </div>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                        <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row g-4">
                                <nav class="navbar-circle bg-primary">
                                    <div class="container-fluid" style="display:flex;justify-content: space-around">
                                        <span class="navbar-text text-white text-bold">
                                            your Expert booked adn payments
                                        </span>
                                    </div>
                                </nav>
                                {{-- @foreach ($user->payments as $payment)
                                    @if ($payment->availableTime && $payment->availableTime->expert)
                                        <h4>{{ $payment->availableTime->expert->name }}</h4>
                                    @endif
                                @endforeach --}}
                                @forelse ($user->payments as $payment)
                                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                        <div class="h-100">
                                            <div class="d-flex">
                                                <div class="border-end d-none d-lg-block"></div>

                                                @if ($payment->availableTime->expert->image !== null)
                                                    <td>
                                                        <img class="img-circle img-bordered-sm img-profile"
                                                            width="30%" src="{{ Storage::url($payment->availableTime->expert->image) }}"
                                                            alt="course image">
                                                    </td>
                                                @else
                                                    <td>
                                                        <div style="margin-left: 3em !important; position: relative; top: 1em;  right: 1.7em;"
                                                            class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                            <i class="fas fa-graduation-cap text-white"></i>
                                                        </div>
                                                    </td>
                                                @endif
                                                <div class="ps-3">
                                                    <h4>{{ $payment->availableTime->expert->name }}</h4>
                                                    <span>Paid:
                                                        {{$payment->total}}
                                                    </span>
                                                </div>
                                                <a href="{{ route('ftms.course', $course->id) }}" class="mr-10 btn btn-outline-primary btn-sm">Meet Link: <i class="far fa-arrow-alt-circle-right"></i></a>
                                            </div>
                                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                        </div>
                                    </div>
                                @empty

                                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                        <div class="h-100">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                    <i class="fa fa-users text-white"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h4 class="text-danger">you don,t have any course</h4>
                                                    {{-- <span>Clita erat ipsum lorem sit sed stet duo justo</span> --}}
                                                </div>
                                                <div class="border-end d-none d-lg-block"></div>
                                            </div>
                                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                        </div>
                                    </div>
                                @endforelse

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



    <!-- Modal -->
    <div class="modal fade" id="settingProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="settingProfileLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="settingProfileLabel">Edit Profile Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border rounded p-4">
                        <nav>
                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link fw-semi-bold active" id="nav-user-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-user" type="button" role="tab"
                                    aria-controls="nav-user" aria-selected="true">user information</button>
                                <button class="nav-link fw-semi-bold" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">profile information</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-user" role="tabpanel"
                                aria-labelledby="nav-user-tab">
                                <form enctype="multipart/form-data">
                                    @csrf
                                    <div class="container row g-3">
                                        <div class="col-6 mb-3">
                                            <label for="inputModalName" class="form-label">Name</label>
                                            <input id="inputModalName" name="name" type="text"
                                                placeholder="Enter Your Name"
                                                class="form-control @error('name') is-invalid @enderror "
                                                value="{{ Auth::user()->name }}" />
                                            @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalEmail" class="form-label">Email</label>
                                            <input id="inputModalEmail" name="email" type="email"
                                                placeholder="Enter Your email"
                                                class="form-control @error('email') is-invalid @enderror "
                                                value="{{ Auth::user()->email }}" />
                                            @error('email')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalusername" class="form-label">UserName</label>
                                            <input id="inputModalusername" name="username" type="text"
                                                placeholder="userName"
                                                class="form-control @error('username') is-invalid @enderror "
                                                value="{{ Auth::user()->username }}" />
                                            @error('username')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalphone" class="form-label">phone</label>
                                            <input id="inputModalphone" name="phone" type="text"
                                                placeholder="Phone"
                                                class="form-control @error('phone') is-invalid @enderror "
                                                value="{{ Auth::user()->phone }}" />
                                            @error('phone')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="inputModalimage" class="form-label">Choose Image</label>
                                            <input id="inputModalimage" name="user_image" type="file"
                                                class="form-control @error('user_image') is-invalid @enderror "
                                                value="{{ old('user_image') }}" />
                                            @error('user_image')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <button type="button" onclick="updateUser()" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <form>
                                    @csrf
                                    <div class="container row g-3">
                                        <div class="col-12 mb-3">
                                            <label for="inputModalCreatebio" class="form-label">Bio</label>
                                            <textarea id="inputModalCreatebio" name="createbio" type="text" placeholder="Enter Your bio"
                                                class="form-control" value="{{ Auth::user()->profile->bio ?? '' }}">{{ Auth::user()->profile->bio ?? '' }}</textarea>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalCreatefb" class="form-label">facebook</label>
                                            <input id="inputModalCreatefb" name="createfb" type="text"
                                                placeholder="Enter Your facebook url" class="form-control"
                                                value="{{ Auth::user()->profile->fb ?? '' }}" />
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalCreatetw" class="form-label">twitter</label>
                                            <input id="inputModalCreatetw" name="createtw" type="text"
                                                placeholder="Enter Your twitter url" class="form-control"
                                                value="{{ Auth::user()->profile->tw ?? '' }}" />
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalCreatein" class="form-label">instagram</label>
                                            <input id="inputModalCreatein" name="createin" type="text"
                                                placeholder="Enter Your instagram url" class="form-control"
                                                value="{{ Auth::user()->profile->in ?? '' }}" />
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="inputModalCreateli" class="form-label">linkedin</label>
                                            <input id="inputModalCreateli" name="createli" type="text"
                                                placeholder="Enter Your linkedin url" class="form-control"
                                                value="{{ Auth::user()->profile->li ?? '' }}" />
                                        </div>
                                        <button type="button" onclick="updateProfile()" class="btn btn-primary">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        function showMessage(icon, message) {
            Swal.fire({
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 3500
            });
        }

        function updateUser() {

            const img = document.getElementById('inputModalimage').files[0];
            console.log(img);
            var datacontent = new FormData();
            datacontent.append('name', document.getElementById('inputModalName').value);
            datacontent.append('email', document.getElementById('inputModalEmail').value);
            datacontent.append('username', document.getElementById('inputModalusername').value);
            datacontent.append('phone', document.getElementById('inputModalphone').value);
            if (img != null) {
                datacontent.append('image', img);
            }

            var config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

            axios.post(`/site-profile/update-user`, datacontent, config)
                .then(function(response) {
                    if (response.data.data.errors != null) {
                        var errors = response.data.data.errors;
                        for (var key in errors) {
                            Toast.fire({
                                icon: response.data.status,
                                title: errors[key][0],
                            });
                        }
                    } else {
                        showMessage('success', response.data.message);
                        window.location.reload();
                    }

                })
                .catch(function(error) {
                    showMessage('error', error.message);
                })

        }

        function updateProfile() {

            axios.post(`/site-profile/update-profile`, {
                    bio: document.getElementById('inputModalCreatebio').value,
                    facebook: document.getElementById('inputModalCreatefb').value,
                    twitter: document.getElementById('inputModalCreatetw').value,
                    linkedin: document.getElementById('inputModalCreateli').value,
                    instagram: document.getElementById('inputModalCreatein').value
                })
                .then(function(response) {
                    if (response.data.data.errors != null) {
                        var errors = response.data.data.errors;
                        for (var key in errors) {
                            Toast.fire({
                                icon: response.data.status,
                                title: errors[key][0],
                            });
                        }
                    } else {
                        showMessage('success', response.data.message);
                        window.location.reload();
                    }

                })
                .catch(function(error) {
                    Toast.fire({
                        icon: 'error',
                        title: error.message,
                    });
                    console.log(error);
                })

        }
    </script>

    {{-- script --}}
    <script src="{{ asset('siteassets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('siteassets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('siteassets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('siteassets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('siteassets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('siteassets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/main.js') }}"></script>
</body>

</html>
