@extends('user_dash.supervisor.master')

@section('title', 'All Courses')

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">

            @if (session('msg'))
                <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
            @endif

               <table class="table table-bordered">
                <thead>
                    <tr  class="bg-dark text-white">
                        <th>ID</th>
                        <th>Course Img</th>
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

                            <td>{{ $course->name }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            @if ($course->status == 1)
                            <td style="color: rgb(3, 164, 3)">opened</td>

                            @else

                            <td style="color:red">closed</td>
                            @endif

                            <td>
                                <a href="{{route('user_dash.supervisor.courses.show',$course->id)}}" class="btn btn-warning btn-sm"  style="margin-left: 5px"> <i class="fas fa-info-circle"></i> </a>
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
