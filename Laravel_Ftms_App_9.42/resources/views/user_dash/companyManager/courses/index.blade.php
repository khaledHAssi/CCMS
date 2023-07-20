@extends('user_dash.companyManager.master')

@section('title', 'All Courses')

@section('content')

<div class="content py-4">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                @if (session('msg'))
                    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                @endif

                <h1>All Courses</h1>
                
                <a href="{{ route('user_dash.cmCourses.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
                    class="btn btn-success mr-5">{{ __('Add New') }}</a>

                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>ID</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>SuperVisor</th>
                            <th>Status</th>
                            <th>Actions</th>
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
                                <td>{{ $course->supervisor->name }}</td>
                                <td>{{ $course->status }}</td>

                                <td class="text-center">
                                    <a href="{{ route('user_dash.cmCourses.show', $course->id) }}"
                                        class="btn btn-primary btn-sm mr-1"> <i class="fas fa-eye"></i> </a>
                                    <a href="{{ route('user_dash.cmCourses.edit', $course) }}"
                                        class="btn btn-warning btn-sm mr-1"> <i class="fas fa-edit"></i> </a>
                                    <form class="d-inline" action="{{ route('user_dash.cmCourses.destroy', $course->id) }}"
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
