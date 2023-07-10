@extends('admin.master')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">edit Tasks</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.tasks.update' , $task->id ) }}">
                        @method('PUT') {{-- لان الفورم لا يدعم البوت --}}
                        @csrf
                        <div class="card-body">
                            @if (session('msg'))
                            <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
                        @endif
                            <div class="mb-3">
                                <label for="company_id">Company Id</label>
                                <select name="company_id"id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    @foreach ($companies as $company)

                                    <option @selected($company->id==$task->company_id) value="{{$company->id}}">{{$company->id .' - '. $company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="course_id">Course Id</label>
                                <select name="course_id"id="course_id" class="form-control @error('course_id') is-invalid @enderror">
                                    @foreach ($courses as $course)

                                    <option @selected($course->id==$task->id) value="{{$course->id}}">{{$course->id .' - '. $course->name}}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="main_mark">Main mark</label>
                                <input type="number" class="form-control" name="main_mark" id="main_mark "
                                value="{{old('main_mark') ?? $task->main_mark}}"    placeholder="Enter Main mark">
                            </div>  {{--  عدم حذف البيانات المرسلة من الانبوت في حال حدوث خطأ ,,- {{old('password')}} --}}

                            <div class="form-group">
                                <label for="question">Question</label>
                                <input type="question" class="form-control" name="question" id="question"
                                value="{{old('question') ?? $task->question}}"    placeholder="question">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="title" class="form-control" name="title" id="title"
                                value="{{old('title') ?? $task->title}}"    placeholder="title">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start - Date</label>
                                <input type="date" class="form-control" name="start_date"value="{{old('start_date') ?? $task->start_date}}" >
                         </div>
                         <div class="form-group">
                             <label for="end_date">End - Date</label>
                             <input type="date" class="form-control" name="end_date" value="{{old('end_date') ?? $task->end_date}}" >
                      </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
*
</section>
@endsection
