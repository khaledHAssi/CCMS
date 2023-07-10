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
<section class="content">
    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

              <h1 class="m-0">Evaluation answers</h1>
              <a href="{{ route('admin.evaluationAnswer.create') }}" style="margin-bottom: 5px;margin-top: 5px;;"
              class="btn btn-success mr-5">{{ __('Add New') }}</a>

            </div><!-- /.col -->
          </div><!-- /.row -->
        <div class="row">

            <div class="col-12">

                <div class="card">
                    <div class="card-header bg-gray" >
                        <h3 class="card-title">Data Of EvaluationAnswer</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Ealuation</th>
                                    <th>Answer Type</th>
                                    <th>reason</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($EvaluationAnswer as $evalAns) {{-- لفلي على الاريي وحط كل صف في متغير الايتم --}}

                                <tr >
                                    <td>{{$loop->index +1}}</td>
                                    <td>
                                        {{$evalAns->evaluation_id}} -
                                        @foreach ($evaluations as $evaluation )
                                            @if ($evalAns->evaluation_id == $evaluation->id)
                                                {{$evaluation->title}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$evalAns->answer_type}}</td>
                                    <td>{{$evalAns->reason}}</td>
                                    <td>
                                        <a href="{{ route('admin.evaluationAnswer.edit', $evalAns) }}" class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <form class="d-inline" action="{{ route('admin.evaluationAnswer.destroy', $evalAns->id) }}" method="POST">
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






