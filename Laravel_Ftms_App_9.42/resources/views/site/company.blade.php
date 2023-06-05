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
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Our courses</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">

            @foreach ($company->courses as $course)
            <div class="testimonial-item">
                <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                    <div class="btn-square bg-white border rounded-circle">
                        <i class="fas fa-graduation-cap right fa-2x text-primary"></i>
                    </div>
                    <img class="rounded-circle mb-3" src="{{ Storage::url($course->image) }}" alt="">
                    <a href="{{ route('ftms.course', $course->id) }}"><i class="fa fa-link fa-3x text-primary"></i></a>

                    <h4>{{ $course->name }}</h4>
                    <small> <i class="bx bx-calendar"></i> {{ $course->start_date }}</small> - <small> {{ $course->end_date }}</small>

            </div>
            <div class="testimonial-item">
                <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                    <span>                    {{ Str::words(strip_tags($course->description), 10, '...') }}

                    </span>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endforeach
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



    <section class="text-center">
        <div class="container">
            {!! $company->location !!}
        </div>
    </section>


@stop
