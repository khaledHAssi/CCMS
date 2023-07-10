@extends('user_dash.companyManager.master')

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
            <a href="{{ route('user_dash.cmCourses.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
              class="btn btn-success mr-5">{{ __('Add New') }}</a>

            <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Course Img</th>
                        <th>SuperVisor Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                    @if($course->image)
                            <td>
                            <img class="img-circle img-bordered-sm" height="65" width="65"
                                    src="{{ Storage::url($course->image) }}" alt="course image">
                            </td>
                    @else
                            <td style="color:red;">No Pic</td>
                    @endif

                           <td>{{ $course->supervisor->id }} - {{$course->supervisor->name}}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            @if ($course->status == 1)
                            <td style="color: rgb(3, 164, 3)">opened</td>

                            @else

                            <td style="color:red">closed</td>
                            @endif

                            <td style="display: flex;">
                                <a href="" class="btn btn-warning btn-sm"  style="margin-left: 5px"> <i class="fas fa-info-circle"></i> </a>
                                <a href="{{ route('user_dash.cmCourses.edit', $course) }}" style="margin-left: 5px" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                <form class="d-inline" action="{{ route('user_dash.cmCourses.destroy', $course->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button style="margin-left: 5px" onclick="return confirm('Are you sure!?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
