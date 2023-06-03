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

<div class="content">
    <div class="container-fluid">
      <div class="card mt-4">
          <div class="card-body">
              <h1>Tasks</h1>
              <a href="{{ route('admin.tasks.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
              class="btn btn-success mr-5">{{ __('Add New') }}</a>
              <table class="table table-bordered">
                  <thead>
                      <tr  class="bg-dark text-white">
                          <th>Id</th>
                          <th>Company id</th>
                          <th>User id</th>
                          <th>Title</th>
                          <th>Main mark </th>
                          <th>Question</th>
                          <th>Actions</th>
                      </tr>
                  </thead>

             </div><!-- /.col -->

          </div><!-- /.row -->



                            <tbody>
                                @foreach ($tasks  as $task) {{-- لفلي على الاريي وحط كل صف في متغير الايتم --}}
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    @foreach ($companies as $company )
                                    @if ($task->company_id == $company->id)
                                    <td>{{$company->id}} - {{$company->name}}</td>
                                    @endif
                                    @endforeach
                                    @foreach ($courses as $course )
                                    @if ($task->course_id == $course->id)
                                    <td>{{$course->id}} - {{$course->name}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->main_mark}}</td>
                                    <td>{{$task->question}}</td>
                                    <td>
                                        <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Are you sure!?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection






