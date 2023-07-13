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
                        <h1>Evaluations</h1>
                        <a href="{{ route('admin.evaluation.create') }}" class="btn btn-success">{{ __('Add New') }}</a>

                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>ID</th>
                                    <th>Title </th>
                                    <th>question</th>
                                    <th>Start - Date </th>
                                    <th>End - Date </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluation as $eval)
                                    {{-- لفلي على الاريي وحط كل صف في متغير الايتم --}}
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $eval->title }}</td>
                                        <td>{{ $eval->question }}</td>
                                        <td>{{ $eval->start_date }}</td>
                                        <td>{{ $eval->end_date }}</td>
                                        <td>
                                            <a href="{{ route('admin.evaluation.edit', $eval) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> </a>
                                            <form class="d-inline"
                                                action="{{ route('admin.evaluation.destroy', $eval->id) }}" method="POST">
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
