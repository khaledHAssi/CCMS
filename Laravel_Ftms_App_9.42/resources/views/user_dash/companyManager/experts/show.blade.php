@extends('user_dash.companyManager.master')

@section('title', $expert->name . ' Expert')

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
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <div class="content py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="container-xxl">
                        <div class="container">
                            <div class="row g-4 align-items-center mb-4 flex">
                                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="d-flex justify-content-center mb-4">
                                        <img class="img-thumbnail" width="450" src="{{ Storage::url($expert->image) }}"
                                            alt="user image">
                                    </div>
                                </div>
                                <div class="col-lg-4 wow fadeInUp details" style="position: relative;top:-2em;bottom: 1em;"
                                    data-wow-delay="0.3s">
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Name: </h4>
                                        <h5 class="Headers5">
                                            {{ $expert->name }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Hour price: </h4>
                                        <h5 class="Headers5">
                                            {{ $expert->hour_price }}
                                        </h5>
                                    </div>
                                    @php
                                        $timesCount = count($expert->availableTimes);
                                        $status0Count = $expert->availableTimes->where('status', 0)->count();
                                        $status1Count = $expert->availableTimes->where('status', 1)->count();
                                    @endphp


                                    <div style="display:flex;">
                                        <h4 class="Headers4">All Times Count: </h4>
                                        <h5 class="Headers5">
                                            {{ $timesCount }}
                                        </h5>
                                    </div>
                                </div>

                            </div>
                            <hr>
                        </div>
                    </div>
                    <a href="{{ route('user_dash.cmAvailableTimes.create', ['id' => $expert->id]) }}"
                        style="margin-bottom: 5px;margin-top: 5px;;"
                        class="btn btn-primary mr-5">{{ __('Add New Available time') }} <i class="fas fa-plus ml-1"></i></a>
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Price</th>
                                <th>Meet Link</th>
                                <th>Date</th>
                                <th>Hour From</th>
                                <th>Hour to</th>
                                <th>Actions</th>
                            </tr>
                            <tr class="bg-dark text-white text-center">
                                <th colspan="7">Available Times - <span>count it: {{ $status0Count }}</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($status0Count === 0)
                                <tr>
                                    <td colspan="7">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($expert->availableTimes as $time)
                                    @if ($time->status == 0)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $time->price }}</td>
                                            <td class="text-primary">
                                                @if ($time->link != null)
                                                    <a href="{{ $time->link }}">{{ $time->link }} <i
                                                            class="fas fa-video ml-1"></i></a>
                                                @else
                                                    <p class="text-warning">Your meet is face to face in the company</p>
                                                @endif
                                            </td>
                                            <td>{{ $time->date }}</td>
                                            <td>{{ $time->hour_from }}</td>
                                            <td>{{ $time->hour_to }}</td>

                                            <td>
                                                <a href="{{ route('user_dash.cmAvailableTimes.edit', $time) }}"
                                                    class="btn btn-warning btn-sm"> <i class="fas fa-edit"></i> </a>
                                                <form class="d-inline"
                                                    action="{{ route('user_dash.cmAvailableTimes.destroy', $time->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Are you sure!?')"
                                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif


                            <tr class="bg-success text-white">
                                <td colspan="12" class="text-center text-bold">Booked Times - count it:
                                    {{ $status1Count }}</td>
                            </tr>

                            @if ($status1Count === 0)
                                <tr>
                                    <td colspan="7">No Data Found</td>
                                </tr>
                            @else
                                @foreach ($expert->availableTimes as $time)
                                    @if ($time->status == 1)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $time->price }}</td>
                                            <td class="text-primary">
                                                @if ($time->link != null)
                                                    <a href="{{ $time->link }}">{{ $time->link }} <i
                                                            class="fas fa-video ml-1"></i></a>
                                                @else
                                                    <p class="text-warning">Your meet is face to face in the company</p>
                                                @endif
                                            </td>
                                            <td>{{ $time->date }}</td>
                                            <td>{{ $time->hour_from }}</td>
                                            <td colspan="2">{{ $time->hour_to }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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

        function showMessage(icon, message) {
            Swal.fire({
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 3500
            });
        }


        @if (session('msg'))
            Toast.fire({
                icon: '{{ session('type') }}',
                title: '{{ session('msg') }}'
            })
        @endif
    </script>
@stop
