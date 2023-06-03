@extends('admin.master')

@php
    $title = "Users"
@endphp

@section('title',$title)

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">

                    <h1>{{ $title }}</h1>
                    <a href="{{ route('admin.users.create') }}" style="margin-bottom: 5px;margin-top: 5px;;" class="btn btn-success mr-5">{{__('Add New')}}</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>PersonalPhoto</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Actions</th>
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
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    {{-- <td><img width="80" src="{{ asset($user->image) }}" alt=""></td> --}}
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-sm"> <i
                                                class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}"
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
