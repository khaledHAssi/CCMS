@extends('user_dash.doctor.master')

@section('title', 'All Experts')

@section('content')
    @forelse ($experts as $expert)
        @if ($expert->company_id != null)
            <div class="content" style="margin-bottom: 5em">
                <div class="container-fluid">
                    <div class="card mt-4">
                        <div class="card-body">

                            @if (session('msg'))
                                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                            @endif

                            <h1>All companies experts</h1>

                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th>ID</th>
                                        <th>Expert Img</th>
                                        <th>Name</th>
                                        <th>Hour Price</th>
                                        <th>Company</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <td>{{ $loop->index + 1 }}</td>
                                    @if ($expert->image != null)
                                        <td>
                                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                                src="{{ Storage::url($expert->image) }}">
                                        </td>
                                    @else
                                        <td style="color:red;">No Pic</td>
                                    @endif

                                    <td>{{ $expert->name }}</td>

                                    <td>{{ $expert->hour_price }}</td>


                                    <td class="text-success">
                                        @foreach ($companiesName as $companyName)
                                            Employee In {{ $companyName }} Company<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ url('user_dash/doctor/dash/availableTime/Create/' . $expert->id . '/' . $expert->company_id) }}"
                                            class="btn btn-primary btn-sm">{{ __('Add available time') }} <i
                                                class="fas fa-edit"></i> </a>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content" >
                <div class="container-fluid">
                    <div class="card mt-4">
                        <div class="card-body">    <h1>All Freelancer Experts</h1>
            <a href="{{ route('user_dash.doctor.dash.expertCreate') }}"
                style="margin-bottom: 5px;margin-top: 5px;;"
                class="btn btn-success mr-5">{{ __('Add New') }}</a>


                @else




                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th>ID</th>
                                        <th>Expert Img</th>
                                        <th>Name</th>
                                        <th>Hour Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($expert->image)
                                        <td>
                                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                                src="{{ Storage::url($expert->image) }}" alt="expert image">
                                        </td>
                                    @else
                                        <td style="color:red;">No Pic</td>
                                    @endif

                                    <td>{{ $expert->name }}</td>

                                    <td>{{ $expert->hour_price }}</td>

                                    <td>

                                        <a href="{{ url('user_dash/doctor/dash/availableTime/Create/' . $expert->id . '/' . $expert->company_id) }}"
                                            class="btn btn-primary btn-sm">{{ __('Add available time') }} <i
                                                class="fas fa-edit"></i> </a>
                                        {{-- @endif --}}
                                        <a href="{{ route('user_dash.doctor.dash.expertEdit', $expert) }}"
                                            class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline"
                                            action="{{ route('user_dash.doctor.dash.expertDestroy', $expert->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure!?')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <tr>
        @endif
        </tr>
    @empty
        <tr>
            <td colspan="3">No Data Found</td>
        </tr>
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

@stop
