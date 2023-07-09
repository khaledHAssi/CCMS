@extends('admin.master')

@section('title', 'All Courses')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="card mt-4">
                <div class="card-body">

                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                    @endif

                    <h1>All Courses</h1>
                    <a href="{{ route('admin.courses.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
                        class="btn btn-success mr-5">{{ __('Add New') }}</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>SuperVisor</th>
                                <th>Actions</th>
                                {{-- <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th> --}}
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @if ($course->image)
                                        <td>
                                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                                src="{{ Storage::url($course->image) }}" alt="course image">
                                        </td>
                                    @else
                                        <td style="color:red;">No Pic</td>
                                    @endif
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->company->name }}</td>

                                    <td>{{ $course->supervisor->name }}</td>
                                    {{-- <td>{{ $course->description }}</td>
                                    <td>{{ $course->start_date }}</td>
                                    <td>{{ $course->end_date }}</td> --}}

                                    <td class="text-center">
                                        <a href="{{ route('admin.courses.show', $course->id) }}"
                                            class="btn btn-primary btn-sm mr-1"> <i class="fas fa-eye"></i> </a>
                                        <a href="{{ route('admin.courses.edit', $course) }}"
                                            class="btn btn-warning btn-sm mr-1"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.courses.destroy', $course->id) }}"
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
