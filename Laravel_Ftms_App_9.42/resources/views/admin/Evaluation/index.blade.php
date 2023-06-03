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
              <h1>Evaluations</h1>
              <a href="{{ route('admin.evaluation.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
              class="btn btn-success mr-5">{{ __('Add New') }}</a>

              <table class="table table-bordered">
                  <thead>
                      <tr  class="bg-dark text-white">
                          <th>ID</th>
                          <th>Company ID</th>
                          <th>Title </th>
                          <th>question</th>
                          <th>Actions</th>
                      </tr>
                  </thead>

             </div><!-- /.col -->

          </div><!-- /.row -->



                            <tbody>
                                @foreach ($evaluation  as $eval) {{-- لفلي على الاريي وحط كل صف في متغير الايتم --}}
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$eval->company->id}} - {{$eval->company->name}}</td>
                                    <td>{{$eval->title}}</td>
                                    <td>{{$eval->question}}</td>
                                    <td>
                                        <a href="{{ route('admin.evaluation.edit', $eval) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.evaluation.destroy', $eval->id) }}" method="POST">
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






