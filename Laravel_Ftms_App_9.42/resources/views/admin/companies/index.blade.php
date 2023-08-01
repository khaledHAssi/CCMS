@extends('admin.master')

@section('title', 'Companies')

@section('content')
<div class="content py-4">
  <div class="container-fluid">
    <div class="card">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

            <table class="table table-bordered">
            <h1>All Companies</h1>
            <a href="{{ route('admin.companies.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
            class="btn btn-success mr-5">{{ __('Add New') }}</a>

            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($companies as $company)
                        <tr>
                            <td>{{ $loop->index +1  }}</td>
                            <td>{{ $company->name }}</td>
                            <td><img width="150rem" class="rounded float-start" src="{{ asset($company->image) }}" alt=""></td>
                            <td>
                                <a href="{{ route('admin.companies.show', $company->id) }}"
                                    class="btn btn-primary btn-sm mr-1"> <i class="fas fa-eye"></i> </a>
                                <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure!?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
