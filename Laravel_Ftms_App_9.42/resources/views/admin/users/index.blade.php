@extends('admin.master')

@php
    $title = 'Users';
@endphp

@section('title', $title)



@section('content')
<style>
    .dataTables_length {
    display: none;
}
    .dataTables_filter {
    display: none;
}

</style>
    <div class="content py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">

                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                        @endif

                        <h1>{{ $title }}</h1>
                        <a href="{{ route('admin.users.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
                            class="btn btn-success mr-5">{{ __('Add New') }}</a>
                            <div class="card-header bg-dark">
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input id="user-search" type="text" class="form-control float-right"
                                            placeholder="Search users">
                                        <div class="input-group-append">
                                            <button id="search-button" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>ID</th>
                                    <th>PersonalPhoto</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index +1 }}</td>
                                        @if ($user->image)
                                            <td>
                                                <img class="img-circle img-bordered-sm img-profile" height="100"
                                                    width="60%" src="{{ Storage::url($user->image) }}"
                                                    alt="user image">
                                            </td>
                                        @else
                                            <td style="color:red;">No Pic</td>
                                        @endif
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="mr-2 btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline"
                                                action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-button').on('click', function() {
                var searchValue = $('#user-search').val().trim();
                $('#users-table').DataTable().search(searchValue).draw();
            });
        });
    </script>
@endsection
