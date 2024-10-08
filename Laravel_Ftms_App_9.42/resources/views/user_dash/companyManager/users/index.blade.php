@extends('user_dash.companyManager.master')

@php
    $title = 'Users';
@endphp

@section('title', $title)

@section('content')

    <div class="content py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <h1>{{ $title }}</h1>
                    <a href="{{ route('user_dash.cmUsers.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
                        class="btn btn-success mr-5">{{ __('Add New') }}</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>PersonalPhoto</th>
                                <th>Name</th>
                                <th>type</th>
                                <th>Email</th>
                                <th>phone</th>
                            </tr>
                        </thead>
                        <tbody>


                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    @if ($user->image)
                                        <td>
                                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                                src="{{ Storage::url($user->image) }}" alt="user image">
                                        </td>
                                    @else
                                        <td style="color:red;">No Pic</td>
                                    @endif
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    {{-- <td><img width="80" src="{{ asset($user->image) }}" alt=""></td> --}}

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

@stop
