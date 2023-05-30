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
                        <h3 class="card-title">edit Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.evaluation.update' , $evaluation->id ) }}">
                        @method('PUT') {{-- لان الفورم لا يدعم البوت --}}
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> validation errors</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                              </div>
                            @endif
                            <div class="mb-3">
                                <label for="company_id">Company Id</label>
                                <select name="company_id"id="company_id" class="form-control @error('company_id') is-invalid @enderror">
                                    @foreach ($companies as $company)

                                    <option @selected($company->id==$evaluation->company->id) value="{{$company->id}}">{{$company->id .' - '. $company->name}}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">title</label>
                                <input type="title" class="form-control" name="title" id="title "
                                value="{{old('title') ?? $evaluation->title}}"    placeholder="Enter title">
                            </div>  {{--  عدم حذف البيانات المرسلة من الانبوت في حال حدوث خطأ ,,- {{old('password')}} --}}

                            <div class="form-group">
                                <label for="question">question</label>
                                <input type="question" class="form-control" name="question" id="question"
                                value="{{old('question') ?? $evaluation->question}}"    placeholder="question">
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
