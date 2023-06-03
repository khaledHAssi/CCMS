<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <!-- Bootstrap CSS -->
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

        /* ---------------------------------- */
        .timeline-panel {
            /* width: 50%; */
            /* float: right; */
            max-height: 165px;
            border: 1px solid #eee;
            background: #fff;
            border-radius: 3px;
            padding: 20px;
            position: relative;
            /* bottom: 126px; */
            /* left: 564px; */
            -webkit-box-shadow: 0 1px 20px 1px rgb(69 65 78 / 70%);
            -moz-box-shadow: 0 1px 20px 1px rgba(69, 65, 78, .06);
            box-shadow: 0 1px 20px 0px rgb(69 65 78 / 24%);
            /* display: flex; */
            justify-content: center;
        }

        .timeline-panel-2 {
            /* width: 50%; */
            max-height: 165px;
            /* float: left; */
            border: 1px solid #eee;
            background: #fff;
            border-radius: 3px;
            padding: 20px;
            position: relative;
            /* bottom: 126px; */
            /* left: -83px; */
            -webkit-box-shadow: 0 1px 20px 1px rgb(69 65 78 / 70%);
            -moz-box-shadow: 0 1px 20px 1px rgba(69, 65, 78, .06);
            box-shadow: 0 1px 20px 0px rgb(69 65 78 / 24%);
            /* display: flex; */
            justify-content: center;
            /* margin-top: 60px; */
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-stats .icon-big.icon-primary {
            background: #1572e8;
        }

        .row.parent1 {
            margin-top: -141px;
        }

        a.btn.btn-secondary.btn-block {
            background-color: #ff4d29;
            border: none;
            width: 100%;
            margin-left: -14px;
        }

        .view-profile1 {
            margin: 40px !important;
            color: orange;
            margin-left: 31px;
        }

        i.fa-solid.fa-user,
        .fa-envelope,
        .fa-mobile-retro,
        .fa-heart {
            color: #ff4d29;
        }
    </style>


</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <!-- TOP NAV -->
    <div class="top-nav" id="home">
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
    </div>

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('ftms.index') }}">Prixima<span class="dot">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
    </nav>



    <!-- SLIDER -->
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 py-5">
                    <div class="row">

                        <div class="col-12">
                            <div class="info-box">
                                <div class="btn btn-icon "><i style="font-size: 50px; line-height: 1px;"
                                        class="fa-solid fa-user"></i></div>
                                <div class="ms-4">
                                    <h5>Student Name</h5>
                                    <p>Abdalrahman Alhalaq</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <div class="btn btn-icon "><i style="font-size: 50px; line-height: 1px;"
                                        class="fa-solid fa-envelope"></i></div>


                                <div class="ms-4">
                                    <h5>Student Email</h5>
                                    <p>Aboood@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <div class="btn btn-icon "><i style="font-size: 50px; line-height: 1px;"
                                        class="fa-solid fa-mobile-retro"></i></div>
                                <div class="ms-4">
                                    <h5>Student Mobile</h5>
                                    <p>+972-595577243</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <div class="btn btn-icon "><i style="font-size: 50px; line-height: 1px;"
                                        class="fa-solid fa-heart"></i></div>
                                <div class="ms-4">
                                    <h5>Social Midea</h5>
                                    <div class="col-auto social-icons" style="margin-left: -7px;">
                                        <a href="#"><i style="font-size: 20px;  line-height: 1px; color: black;"
                                                class="bx bxl-facebook"></i></a>
                                        <a href="#"><i
                                                style="font-size: 20px; margin-left: 0px; line-height: 1px; color: black;"class="bx bxl-twitter"></i></a>
                                        <a href="#"><i
                                                style="font-size: 20px; margin-left: 0px; line-height: 1px; color: black;"class="bx bxl-instagram"></i></a>
                                        <a href="#"><i
                                                style="font-size: 20px; margin-left: 0px; line-height: 1px; color: black;"
                                                class="bx bxl-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="view-profile1" style="margin:20px;color: orange">
                        <a href="#" class="btn btn-secondary btn-block">Edit</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img style="     margin: 76px;" src="{{ asset('siteassets/img/about.png') }}" alt="">
                </div>
            </div>

        </div>
    </section>
    <div class="container">
        <div class="row parent1">
            <div class="col">
                <section id="description">
                    <div class="container">
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Discription</h4>
                                <p><small class="text-muted"><i class="flaticon-message"></i> 11 hours ago via
                                        ...</small></p>
                            </div>
                            <div class="timeline-body">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col">
                <section id="evaluation">
                    <div class="container">
                        <div class="timeline-panel-2">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Evaluation</h4>
                                <p><small class="text-muted"><i class="flaticon-message"></i> 71 hours ago via
                                        ...</small></p>
                            </div>
                            <div class="timeline-body">
                                <p>compony / course / <strong>70%</strong>.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section id="course">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-icon">
                                        <img style="width: 57%;"src="./img/icon1.png" alt="">
                                    </div>
                                    <div class="col col-stats  ml-sm-0">
                                        <h5 class="card-category">C#</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-icon">
                                        <img style="  width: 57%;"src="./img/icon1.png" alt="">
                                    </div>
                                    <div class="col col-stats  ml-sm-0">
                                        <h5 class="card-category">ASP</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-icon">
                                        <img style="  width: 57%;"src="./img/icon1.png" alt="">
                                    </div>
                                    <div class="col col-stats  ml-sm-0">
                                        <h5 class="card-category">LARAVEL</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="card card-stats card-round">
                            <div class="card-body ">
                                <div class="row ">
                                    <div class="col-icon">
                                        <img style="  width: 57%;"src="./img/icon1.png" alt="">
                                    </div>
                                    <div class="col col-stats  ml-sm-0">
                                        <h5 class="card-category">PHP</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- MILESTONE -->



    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">Prixima<span class="dot">.</span></h4>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from</p>
                        <div class="col-auto social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-pinterest'></i></a>
                        </div>
                        <div class="col-auto conditions-section">
                            <a href="#">privacy</a>
                            <a href="#">terms</a>
                            <a href="#">disclaimer</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">Copyright vicpra 2022. All rights Reserved</p> Distributed By <a
                hrefs="https://themewagon.com">ThemeWagon</a>
        </div>
    </footer>

    <script src="{{ asset('siteassets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('siteassets/js/app.js') }}"></script>
</body>

</html>
