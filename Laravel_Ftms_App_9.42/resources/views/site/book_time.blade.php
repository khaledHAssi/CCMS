@extends('site.master')

@section('title', 'Book Time - ' . env('APP_NAME'))

@section('content')

    <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-white">Booking Session with ({{ $time->expert->name }})</h1>
        </div>
    </section>
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 py-5">
                    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>
                    <form action="{{ route('ftms.book_time_status', $time->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX ARGENCARD MADA">
                    </form>
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
