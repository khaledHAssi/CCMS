@extends('user_dash.companyManager.master')

@section('title', 'All Experts')

@section('content')

    <div class="content py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                    @endif

                    <h1>All Experts</h1>
                    <a href="{{ route('user_dash.cmExperts.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
                        class="btn btn-success mr-5">{{ __('Add New') }}</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Expert Img</th>
                                <th>Name</th>
                                <th>Doctor Name</th>
                                <th>Hour Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($experts as $expert)
                                <tr>
                                    <td>{{ $expert->id }}</td>
                                    @if ($expert->image)
                                        <td>
                                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                                src="{{ Storage::url($expert->image) }}" alt="expert image">
                                        </td>
                                    @else
                                        <td style="color:red;">No Pic</td>
                                    @endif

                                    <td>{{ $expert->name }}</td>

                                    {{-- @if ($expert->doctor_id == $expert->user->id)
                                    @endif --}}
                                    <td>{{ $expert->user->name }}</td>
                                    <td>{{ $expert->hour_price }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('user_dash.cmExperts.show', $expert->id) }}"
                                            class="btn btn-primary btn-sm mr-1"> <i class="fas fa-eye"></i> </a>
                                        <a href="{{ route('user_dash.cmAvailableTimes.create', ['id' => $expert->id]) }}"
                                            class="btn btn-primary btn-sm">{{ __('Add available time') }} <i
                                                class="fas fa-plus ml-1"></i> </a>
                                        <a href="{{ route('user_dash.cmExperts.edit', $expert) }}"
                                            class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline"
                                            action="{{ route('user_dash.cmExperts.destroy', $expert->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure!?')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
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
