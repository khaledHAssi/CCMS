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

    <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-white">{{ $course->name }}</h1>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 py-5">
                    {!! $course->description !!}
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset($course->image) }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="text-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="intro">
                        <h6>Need This?</h6>
                        <h1>Apply To Our Course</h1>
                    </div>
                </div>
                <div class="col-md-8">
                    @if (Auth::check())
                    {{-- @dump(Auth::user()->applications()->where('course_id', $course->id)->count()) --}}
                    @php
                        $ap = Auth::user()->applications()->where('course_id', $course->id)->first();
                    @endphp
                    @if ($ap)
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
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" readonly />
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
                            <div class="text-end">
                                <button class="btn px-5 btn-brand">Apply</button>
                            </div>
                        </form>
                    @endif

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
            title: '{{ session("msg") }}'
        })
    @endif
</script>
@stop
