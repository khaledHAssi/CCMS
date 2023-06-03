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
              <h1>Answers</h1>
              <table class="table table-bordered">
                  <thead>
                      <tr  class="bg-dark text-white">
                          <th>Id</th>
                          <th>Task id</th>
                          <th>User id</th>
                          <th>Solution </th>
                          <th>Actions</th>
                      </tr>
                  </thead>

             </div><!-- /.col -->

          </div><!-- /.row -->



                            <tbody>
                                @foreach ($answers as $answer)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    @foreach ($tasks as $task)
                                    @if ($task->id == $answer->task_id)
                                    <td>{{$task->id}} - {{$task->title}}</td>
                                    @endif
                                @endforeach
                                    @foreach ($users as $user)
                                     @if ($user->id == $answer->user_id)
                                    <td>{{$answer->user_id}} - {{$user->name}}</td>
                                    @endif
                                @endforeach
                                    <td>{{$answer->solution}}</td>
                                    <td>
                                        <a href="{{ route('admin.answers.edit', $answer) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.answers.destroy', $answer->id) }}" method="POST">
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






