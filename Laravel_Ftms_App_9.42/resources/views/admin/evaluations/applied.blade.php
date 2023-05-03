@extends('admin.master')

@section('title', 'All Applied Evaluations')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

            <h1>All Applied Evaluations</h1>
            <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Evaluation</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($applied as $apply)
                        <tr>
                            <td>{{ $apply->id }}</td>
                            <td>{{ $apply->user->name }}</td>
                            <td>{{ $apply->evaluation->name }}</td>
                            <td>{{ $apply->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('admin.evaluations.applied_data', $apply->id) }}" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i> </a>
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
