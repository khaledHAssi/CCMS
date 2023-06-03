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
              <h1>Answer marks</h1>
              <a href="{{ route('admin.answer_marks.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
              class="btn btn-success mr-5">{{ __('Add New') }}</a>
              <table class="table table-bordered">
                  <thead>
                      <tr  class="bg-dark text-white">
                          <th>Id</th>
                         <th>Answer id</th>
                          <th>Student mark </th>
                          <th>Actions</th>
                      </tr>
                  </thead>

             </div><!-- /.col -->

          </div><!-- /.row -->



                            <tbody>
                                 @foreach ($Answer_marks as $mark)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    @foreach ($answers as $answer)
                                    @if ($answer->id == $mark->answer_id)
                                    <td>{{$answer->id}} - {{$answer->solution}}</td>
                                    @endif
                                @endforeach

                                    <td>{{$mark->student_mark}}</td>
                                    <td>
                                        <a href="{{ route('admin.answer_marks.edit', $mark) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.answer_marks.destroy', $mark->id) }}" method="POST">
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






