@extends('site.master')

@section('title', 'Home - ' . env('APP_NAME'))

@section('styles')
    <style>
        .service.course-box img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>
@stop

@section('content')
    <style>
        .Headers4 {
            margin-left: 0px;
            margin-right: 10px;
            font-weight: 600;
        }

        .Headers5 {
            margin-left: 0px;
            margin-top: 1.1% !important;
        }
    </style>
    <section style="background-color: blue; padding: 10px" id="reviews">
        <div class="container">
            <h1 class="text-white">Course</h1>
        </div>
    </section>
    <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-primary text-center" style="padding: 50px">{{ $course->name }}</h1>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 py-5">
                    <img class="rounded-circle" width="500" height="400" src="{{ Storage::url($course->image) }}"
                        alt="">

                </div>
                <div class="col-lg-4">
                    <br>
                    <br>
                    <br>

                    <div class="row g-4 align-items-end mb-4 flex">


                    </div>
                    <div class="col-lg-12 wow fadeInUp details" style="" data-wow-delay="0.3s">
                        <div style="display:flex;" >
                            <h4 style="margin-left:0px;" class="Headers4">Name:</h4>
                            <h5 class="Information Headers5" >
                                {{ $course->name }}
                            </h5>
                        </div>
                        {{-- <div style="display:flex;">
                                                <h4 class="Headers4">Company: </h4>
                                                <h5 class="Headers5">
                                                    {{$course->company_id}} -
                                                        {{$company->name}}
                                                </h5>
                        </div> --}}
                        <div style="display:flex;">
                            <h4 class="Headers4">Status: </h4>
                            <h5 class="Headers5 text-warning    " >
                                {{ $course->status }}
                            </h5>
                        </div>
                        <div style="display:flex;">
                            <h4 class="Headers4">Supervisor: </h4>
                            <h5 class="Headers5">
                                {{ $course->supervisor->name }}
                            </h5>
                        </div>
                        <div style="display:flex;">
                            <h4 class="Headers4">Start date: </h4>
                            <h5 class="Headers5">
                                {{ $course->start_date }}
                            </h5>
                        </div>
                        <div style="display:flex;">
                            <h4 class="Headers4">End date: </h4>
                            <h5 class="Headers5">
                                {{ $course->end_date }}
                            </h5>
                        </div>
                        <div style="display:flex;">
                            <h4 class="Headers4">Student Count: </h4>
                            <h5 class="Headers5">
                                35
                            </h5>
                        </div>
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
                                        @if ($course->description != null)
                                            <p class="mb-0">{{ $course->description }}</p>
                                        @else
                                            <p class="mb-0 text-warning">There is no desciption for this course</p>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
        </div>
        </div>
    </section>

    <section id="services" class="text-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="intro">
                        <br>

                        <h6>Need This?</h6>
                        <h1>Apply To Our Course</h1>
                    </div>
                </div>

                <div class="col-md-8">
                    @if (Auth::check())
                        {{-- @dump(Auth::user()->applications()->where('course_id', $course->id)->count()) --}}
                        @php
                            $ap = Auth::user()
                                ->applications()
                                ->where('course_id', $course->id)
                                ->first();
                        @endphp
                        @if ($ap)
                            {{-- @if (false) --}}
                            <p>Your application under review, we will send a message when we approved it</p>
                            <a href="{{ route('ftms.course_cancel', $ap->id) }}" class="btn btn-brand">Cancel Request</a>
                        @else
                            <form action="{{ route('ftms.course_apply', $course->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="company_id" value="{{ $course->company_id }}">
                                <div class="row text-start">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>Name</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                class="form-control" readonly />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                                class="form-control" readonly />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label>Reason</label>
                                            <textarea name="reason" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                </div>
                                <div style="background-color:blue ;text-align: center">
                                    <button class="btn px-5 " style="color:white;">Apply</button>
                                </div>
                            </form>
                        @endif
                        <br>
                        <br>
                        <br>
                    @else
                        <p>Please go to <a href="{{ route('login') }}">login</a> first</p>
                    @endif
                </div>
            </div>

        </div>
    </section>
@stop

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        @if (session('msg'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('msg') }}'
            })
        @endif
    </script>
@stop
