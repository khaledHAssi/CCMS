@extends('site.master')

@section('title', 'Company - ' . env('APP_NAME'))

@section('content')

    <header class="bg-primary py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-6 col-xl-6 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <div class="col-xl-8 col-xxl-8 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-3"
                                src="{{ asset($company->image) }}" alt="..."></div>
                        <h1 class="display-8 fw-bolder text-white mb-2">{{ $company->name }} Company</h1>
                        <p class="lead fw-normal text-white-50 mb-4">
                            {{ Str::words(strip_tags($company->description), 10, '...') }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 col-xxl-6 align-items-center ">
                    <div class="mb-1">
                        {!! $company->location !!}
                    </div>
                    <h5 class="text-white-50 pt-3">company <span class="text-white text-bold">location</span> on the map</h5>
                </div>
                {{-- <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5"
                        src="{{ asset($company->image) }}" alt="..."></div> --}}
            </div>
        </div>
    </header>
    <div class="container-xxl py-5">
        <div class="container">
            {{-- <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Our courses</h1>
        </div> --}}
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">

                @foreach ($company->courses as $course)
                    <div class="testimonial-item">
                        <a href="{{ route('site.course', $course->id) }}" style="text-decoration: none;">
                            <div class="bg-light testimonial-text border rounded p-4 pt-5 mb-2">
                                <div class="btn-square bg-white border rounded-circle">
                                    <i class="fas fa-graduation-cap right fa-2x text-primary"></i>
                                </div>
                                <img class="rounded-circle mb-3" src="{{ Storage::url($course->image) }}" alt="">
                                {{-- <i class="fa fa-link fa-3x text-primary"></i> --}}

                                <h4>{{ $course->name }}</h4>
                                <small class="text-black"> <i class="bx bx-calendar"></i> {{ $course->start_date }}</small>
                                - <small class="text-black">
                                    {{ $course->end_date }}</small>

                            </div>
                            <div class="testimonial-item">
                                <div class="bg-light  border rounded p-4 pt-5 mb-5">
                                    <h6>Description</h6>
                                    <span class="text-black"> {{ Str::words(strip_tags($course->description), 10, '...') }}

                                    </span>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <section class="text-center bg-light">
        <div class="container">
            <h3 class="text-primary text-center pt-3 bold">Company location on the map</h3>
            <div class="p-4">
                {!! $company->location !!}
            </div>
        </div>
    </section> --}}


@stop
