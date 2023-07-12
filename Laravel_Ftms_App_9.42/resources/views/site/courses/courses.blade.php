@extends('site.master')

@section('content')
    <h4 class="mt-3 p-5 mb-4 text-primary text-center h2 bg-light text-lg" style="font-weight: bolder" >Courses</h4>
    <div class="container" style="margin-bottom:2em;">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ($courses as $course)
                <div class="col-lg-4">
                    <div class="card ">
                        <a href="#!"><img class="card-img-top" width="700" height="350"
                                src="{{ Storage::url($course->image) }}" alt="..."></a>
                        <div class="card-body">
                            <div class="small text-muted">End date: {{ $course->end_date }}</div>
                            <h2 class="card-title h4">{{ $course->name }}</h2>
                            <p class="card-text">{{ $course->description }}</p>
                            <a class="btn btn-primary" href="{{ route('site.course', $course->id) }}">Read more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@stop
