@extends('admin.master')

@section('title', 'All AvailableTimes')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

            <h1>All times</h1>
            <a href="{{ route('admin.AvailableTimes.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
            class="btn btn-success mr-5">{{ __('Add New') }}</a>

            <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Buyer name</th>
                        <th>Payment id</th>
                        <th>Date</th>
                        <th>Hour From</th>
                        <th>Hour to</th>
                        <th>total</th>
                    </tr>
                </thead>
                <tbody>
                    {{--

                    * the name of the page : expert operations details(details btn)
                    * display available time table (id,date,hour_form,hour_to,user_name that buy ,total )

                        --}}
--
                    {{-- @forelse ($times as $time)
                    <tr>
                        <td>{{ $loop->index +1}}</td>
                        <td>{{ $time->date }}</td>
                        <td>{{ $time->hour_from }}</td>
                        <td>{{ $time->hour_to }}</td>

                        <td>{{ $time->user->id }} - {{ $time->user->name }}</td>
                        <td>{{ $time->payment->total }} - {{ $time->payment->id }}</td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No Data Found</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

@stop
