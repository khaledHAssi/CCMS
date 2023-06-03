@extends('admin.master')

@section('title', 'All Experts')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

            <h1>All Experts</h1>
            <a href="{{ route('admin.experts.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
            class="btn btn-success mr-5">{{ __('Add New') }}</a>

            <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Expert Img</th>
                        <th>Name</th>
                        <th>Company Id&Name</th>
                        <th>Expert Id&Name</th>
                        <th>Hour Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($experts as $expert)
                        <tr>
                            <td>{{ $expert->id }}</td>
                    @if($expert->image)
                            <td>
                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                    src="{{ Storage::url($expert->image) }}" alt="expert image">
                            </td>
                    @else
                            <td style="color:red;">No Pic</td>
                    @endif

                    <td>{{ $expert->name }}</td>
                            <td>{{ $expert->company_id}} - {{ $expert->company->name }}</td>
                            @foreach ($users as $user)
                        @if ($expert->doctor_id == $user->id)
                            <td>{{ $expert->doctor_id}} - {{ $user->name }}</td>
                        @endif
                            @endforeach
                            <td>{{ $expert->hour_price }}</td>

                            <td>
                                <a href="{{ route('admin.experts.edit', $expert) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('admin.experts.destroy', $expert->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure!?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
