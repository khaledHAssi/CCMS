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

    <section class="bg-light" id="reviews">
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
    </section>

    <section id="services" class="text-center bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h6>What We Do?</h6>
                        <h1>Our Courses</h1>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($company->courses as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="service course-box">
                            <img src="{{ asset($course->image) }}" alt="">
                            <h5>{{ $course->name }}</h5>
                            <small> <i class="bx bx-calendar"></i> {{ $course->start_date }}</small> - <small> {{ $course->end_date }}</small>
                            <p>{{ Str::words(strip_tags($course->description), 10, '...') }}</p>
                            <a href="{{ route('ftms.course', $course->id) }}" class="btn btn-brand">Read More</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section class="text-center">
        <div class="container">
            {!! $company->location !!}
        </div>
    </section>


@stop
