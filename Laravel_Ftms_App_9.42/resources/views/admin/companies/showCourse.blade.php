@extends('admin.master')

@section('title', $course->name . ' Course')

@section('styles')

    <style>
        .Headers4 {
            margin-left: 0px;
            margin-right: 10px;
            font-weight: 600;
        }

        .Headers5 {
            margin-left: 0px;
            margin-top: 1.1% !important;
        }
    </style>
@endsection

@section('content')
    <div class="content py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="container-xxl">
                        <div class="container">
                            <div class="row g-4 align-items-center mb-4 flex">
                                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="d-flex justify-content-center">
                                        <img class="img-thumbnail" width="450" src="{{ Storage::url($course->image) }}"
                                            alt="user image">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <p class="text-warning">
                                            {{ $course->status }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 wow fadeInUp details" style="position: relative;top:-2em;bottom: 1em;"
                                    data-wow-delay="0.3s">
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Name: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->name }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Company: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->company->name }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Supervisor: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->supervisor->name }}
                                        </h5>
                                    </div>
                                </div>

                                <div class="col-lg-3 wow fadeInUp details" style="position: relative;top:-2em;bottom: 1em;"
                                    data-wow-delay="0.3s">
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Start date: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->start_date }}

                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">End date: </h4>
                                        <h5 class="Headers5">
                                            {{ $course->end_date }}
                                        </h5>
                                    </div>
                                    <div style="display:flex;">
                                        <h4 class="Headers4">Student Count: </h4>
                                        <h5 class="Headers5">
                                            @php
                                                $courseStudentsCount = $course->course_students->count();
                                            @endphp
                                            {{ $courseStudentsCount }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <button class="nav-link fw-semi-bold active text-bold" id="nav-story-tab"
                                                data-bs-toggle="tab" data-bs-target="#nav-story" type="button"
                                                role="tab" aria-controls="nav-story"
                                                aria-selected="true">Description</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                            aria-labelledby="nav-story-tab">
                                            <p class="Headers5">
                                                {{ $course->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="h4" style="font-weight: 900;display: block;">Course students</span>
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Mark</th>
                                <th>Note</th>
                                <th>Added at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->course_students as $student)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    @if ($student->pivot->student_mark)
                                        <td>{{ $student->pivot->student_mark }}</td>
                                    @else
                                        <td class="text-danger">No Mark</td>
                                    @endif
                                    @if ($student->pivot->note)
                                        <td>{{ $student->pivot->note }}</td>
                                    @else
                                        <td class="text-danger">No Note</td>
                                    @endif
                                    <td>{{ $student->pivot->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
