@extends('site.master')

@section('title', 'Home - ' . env('APP_NAME'))

@section('styles')
    <style>
        .service.course-box img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        iframe {
            width: 100%;
        }
    </style>
@stop

@section('content')

    <section style="background-color: blue; padding: 10px" id="reviews">
        <div class="container">
            <h1 class="text-white">Company</h1>
        </div>
    </section>
    <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-primary text-center" style="padding: 50px">Our courses</h1>
        </div>
    </section>

    <div class="container-xxl py-5">
        <div class="container">
            {{-- <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Our courses</h1>
        </div> --}}
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">

                @foreach ($company->courses as $course)
                    <div class="testimonial-item">
                        <a href="{{ route('ftms.course', $course->id) }}" style="text-decoration: none;">
                            <div class="bg-light testimonial-text border rounded p-4 pt-5 mb-2">
                                <div class="btn-square bg-white border rounded-circle">
                                    <i class="fas fa-graduation-cap right fa-2x text-primary"></i>
                                </div>
                                <img class="rounded-circle mb-3" src="{{ Storage::url($course->image) }}" alt="">
                                {{-- <i class="fa fa-link fa-3x text-primary"></i> --}}
    
                                <h4>{{ $course->name }}</h4>
                                <small class="text-black"> <i class="bx bx-calendar"></i> {{ $course->start_date }}</small> - <small class="text-black">
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
    {{-- <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-white">{{ $company->name }}</h1>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 py-5">
                    {!! $company->description !!}
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset($company->image) }}" alt="">
                </div>
            </div>
        </div>
    </section> --}}



    <section class="text-center bg-light">
        <div class="container">
            <h3 class="text-primary text-center pt-3 bold">Company location on the map</h3>
            <div class="p-4">
                {!! $company->location !!}
            </div>
        </div>
    </section>


@stop
