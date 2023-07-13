@extends('admin.master')
@section('style')
    <style>
        .style-delete {
            background-color: transparent;
            border: 0;
            color: #007bff;
        }

        .style-del_edi {
            display: flex;
            flex-direction: row;
            gap: 5px;
            color: 007bff;

        }
    </style>
@endsection
@section('content')
    <section>
        <div class="content pt-3">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @if (session('msg'))
                            <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                        @endif
                        <h1>Tasks</h1>
                        <a href="{{ route('admin.tasks.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
                            class="btn btn-success mr-5">{{ __('Add New') }}</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>Id</th>
                                    <th>Company </th>
                                    <th>User </th>
                                    <th>Title</th>
                                    <th>mainMark </th>
                                    <th>Question</th>
                                    <th>startDate</th>
                                    <th>endDate</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tasks as $task)
                                    {{-- لفلي على الاريي وحط كل صف في متغير الايتم --}}
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        @foreach ($companies as $company)
                                            @if ($task->company_id == $company->id)
                                                <td>{{ $company->name }}</td>
                                            @endif
                                        @endforeach
                                        @foreach ($courses as $course)
                                            @if ($task->course_id == $course->id)
                                                <td> {{ $course->name }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->main_mark }}</td>
                                        <td>{{ $task->question }}</td>
                                        <td>{{ $task->start_date }}</td>
                                        <td>{{ $task->end_date }}</td>
                                        <td class="text-center" style="display: flex;justify-content: space-between">
                                            <a href="{{ route('admin.tasks.edit', $task) }}"
                                                class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                            <form class="d-inline" action="{{ route('admin.tasks.destroy', $task->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are you sure!?')"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
