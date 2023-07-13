@extends('site.master')
@section('content')
    <style>
        img {
            opacity: .5;
            width: 20px;
            border: 3px solid black;
        }

        .active img {
            opacity: 1;
            width: 23px;
            box-shadow: 0 0 10px rgba(27, 27, 27, 0.732);
        }

        body {
            overflow-x: hidden
        }
        }

        .nav-tabs {
            border-bottom: 3px solid #dee2e6 !important;
            font-weight: bold
        }
    </style>
    <link href="{{ asset('siteassets/css/startBootstrapStyles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminassets/dist/css/adminlte.min.css') }}">
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-1">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                        class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder">Get in touch</h1>
                        <p class="lead fw-normal text-muted mb-0">Let's work together!</p>
                    </div>
                <div class="mb-1 mt-5" >
                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                    @endif
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
                <div class="row gx-5 justify-content-lg-around">
                    <div class="col-lg-6 col-xl-12">
                        <div class="container-xxl py-5">
                            <div class="container">
                                <div class="row g-4 align-items-end mb-4">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link fw-semi-bold active" id="nav-story-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-story" type="button"
                                                role="tab" aria-controls="nav-story"
                                                aria-selected="true">Contact</button>
                                            <button class="nav-link fw-semi-bold" id="nav-mission-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-mission" type="button" role="tab"
                                                aria-controls="nav-mission" aria-selected="false">Join As Doctor</button>
                                            <button class="nav-link fw-semi-bold" id="nav-vision-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-vision" type="button" role="tab"
                                                aria-controls="nav-vision" aria-selected="false">Join As Company
                                                Manager</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        {{-- contact form --}}
                                        <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                            aria-labelledby="nav-story-tab">
                                            <form action="{{ route('site.store_contact') }}" id="contactForm"
                                                data-sb-form-api-token="API_TOKEN" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{-- important --}}
                                                <input type="hidden" value="contact" name="type">

                                                <!-- Name input-->
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="name" name="name" type="text"
                                                        placeholder="Enter your name..." data-sb-validations="required"
                                                        data-sb-can-submit="no">
                                                    <label for="name">Name</label>
                                                </div>

                                                <!-- Email address input-->
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="email" type="email" name="email"
                                                        placeholder="name@example.com" data-sb-validations="required,email"
                                                        data-sb-can-submit="no">
                                                    <label for="email">Email</label>
                                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email
                                                        is required.
                                                    </div>
                                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is
                                                        not valid.</div>
                                                </div>
                                                <!-- Message input-->
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="description" name="description" type="text"
                                                        placeholder="Enter your Description here..." style="height: 10rem" data-sb-validations="required"
                                                        data-sb-can-submit="no">
                                                    </textarea>
                                                    <label for="Description">Description</label>
                                                    <div class="invalid-feedback" data-sb-feedback="Description:required">A
                                                        Description is
                                                        required.
                                                    </div>
                                                </div>
                                                <!-- Submit Button-->
                                                <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton"
                                                        type="submit">Submit</button></div>
                                            </form>
                                        </div>
                                        {{-- Doctor form --}}
                                        <div class="tab-pane fade" id="nav-mission" role="tabpanel"
                                            aria-labelledby="nav-mission-tab">
                                            <form action="{{ route('site.store_contact') }}" id="DoctorForm"
                                                data-sb-form-api-token="API_TOKEN" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <!-- Name input-->
                                                <div class="form-floating mb-3">
                                                    <label for="link">Meet Link</label>
                                                    <input id="link" name="link" type="url" required
                                                        placeholder="Meet Link" data-sb-validations="required"
                                                        class="text-bold form-control @error('link') is-invalid @enderror " />
                                                    @error('link')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="name" name="name"
                                                        type="text" placeholder="Enter your name..."
                                                        data-sb-validations="required" data-sb-can-submit="no">
                                                    <label for="name">Name</label>
                                                </div>
                                                <!-- Email address input-->
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="email" type="email"
                                                        name="email" placeholder="name@example.com"
                                                        data-sb-validations="required,email" data-sb-can-submit="no">
                                                    <label for="email">Email</label>
                                                    <div class="invalid-feedback" data-sb-feedback="email:required">An
                                                        email is required.
                                                    </div>
                                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is
                                                        not valid.</div>
                                                </div>

                                                {{-- important --}}
                                                <input type="hidden" value="doctor" name="type">
                                                <div class="form-floating mb-3">
                                                    <label for="email">Hour Price</label>
                                                    <input class="form-control" id="hour_price" name="hour_price"
                                                        type="number" placeholder="Hour Price"
                                                        data-sb-validations="required" data-sb-can-submit="no">
                                                    <div class="invalid-feedback" data-sb-feedback="phone:required">A
                                                        phone number is
                                                        required.</div>
                                                </div>
                                                <!-- Message input-->
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="description" name="description" type="text"
                                                        placeholder="Enter your Description here..." style="height: 10rem" data-sb-validations="required"
                                                        data-sb-can-submit="no">
                                                </textarea>
                                                    <label for="Description">Description</label>
                                                    <div class="invalid-feedback" data-sb-feedback="Description:required">
                                                        A Description is
                                                        required.
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="image" name="image">
                                                            <label class="custom-file-label text-bold"
                                                                for="image">Picture</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="content" name="content">
                                                            <label class="custom-file-label text-bold"
                                                                for="content">DoctorDocumentationFile</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Submit Button-->
                                                <div class="d-grid"><button class="btn btn-primary btn-lg"
                                                        id="submitButton" type="submit">Submit</button></div>
                                            </form>
                                        </div>
                                        {{-- companyManger form --}}
                                        <div class="tab-pane fade" id="nav-vision" role="tabpanel"
                                            aria-labelledby="nav-vision-tab">
                                            <form method="POST" action="{{ route('site.store_contact') }}"
                                                id="companyManagerForm"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="companyManager" name="type">

                                                <div class="form-floating mb-3">
                                                    <input id="link" name="link" type="url" required
                                                        placeholder="Location Link" data-sb-validations="required"
                                                        class="text-bold form-control @error('link') is-invalid @enderror " />
                                                    @error('link')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="name" name="name"
                                                        type="text" placeholder="Enter your name..."
                                                        data-sb-validations="required" data-sb-can-submit="no" />
                                                    <label for="name">Name</label>
                                                    @error('name')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <!-- Email address input-->
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="email" type="email"
                                                        name="email" placeholder="name@example.com"
                                                        data-sb-validations="required,email" data-sb-can-submit="no" />
                                                    <label for="email">Email</label>
                                                    @error('email')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                        placeholder="Enter your Description here..." style="height: 10rem" data-sb-validations="required"
                                                        data-sb-can-submit="no"></textarea>
                                                    <label for="description">Description</label>
                                                    @error('description')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="image" name="image">
                                                            <label class="custom-file-label text-bold"
                                                                for="image">Picture</label>
                                                        </div>
                                                        @error('image')
                                                            <small class="invalid-feedback">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="content" name="content">
                                                            <label class="custom-file-label text-bold"
                                                                for="content">CompanyDocumentationFile</label>
                                                            @error('content')
                                                                <small class="invalid-feedback">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid"><button class="btn btn-primary btn-lg"
                                                        id="submitButton" type="submit">Submit</button></div>
                                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@stop

@section('scripts')


    <script src="{{ asset('adminassets\plugins\bs-custom-file-input\bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

@stop
