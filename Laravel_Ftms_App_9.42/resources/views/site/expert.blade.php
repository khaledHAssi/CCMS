@extends('site.master')

@section('title', $expert->name . ' - ' . env('APP_NAME'))

@section('content')

    <section class="bg-light" id="reviews">
        <div class="container">
            <h1 class="text-white">{{ $expert->name }}</h1>
        </div>
    </section>

    <section id="services" class="text-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 mb-4">
                    <img src="{{ asset($expert->image) }}" alt="">
                </div>
                <div class="col-12">
                    <div class="intro">
                        <h6>Need Session?</h6>
                        <h1>This is Available Times For Me</h1>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Hour From</th>
                            <th>Hour To</th>
                            <th>Price</th>
                            <th>Book</th>
                        </tr>
                        @foreach ($expert->available as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->hour_from }}</td>
                                <td>{{ $item->hour_to }}</td>
                                <td>${{ $item->price ? $item->price : $expert->hour_price }}</td>
                                <td>
                                    <form action="{{ route('ftms.book_time') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="time_id" value="{{ $item->id }}">
                                        <button class="btn btn-sm btn-outline-dark ms-3">Book</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

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
