@extends('admin.master')

@section('content')
    <section class="content pt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('admin.evaluation.store') }}">
                            @csrf


                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i>validation error</h5>

                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" value="{{ old('title') }}" class="form-control" name="title" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="title">question</label>
                                    <input type="text" value="{{ old('question') }}" class="form-control" name="question" placeholder="Enter question">
                                </div>

                                {{-- ------------------------------------------------------------ --}}
                                <div class="form-group">
                                    <label for="companies">Company</label><br>
                                    @foreach ($companies as $company)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="company{{ $company->id }}"
                                                name="companies[]" value="{{ $company->id }}">
                                            <label class="form-check-label"
                                                for="company{{ $company->id }}">{{ $company->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- ------------------------------------------------------------ --}}

                                <div class="form-group">
                                    <label for="title">Start - Date</label>
                                    <input type="date" value="{{ old('start_date') }}" class="form-control" name="start_date">
                                </div>
                                <div class="form-group">
                                    <label for="title">End - Date</label>
                                    <input type="date" value="{{ old('end_date') }}" class="form-control" name="end_date">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0/dist/js/i18n/defaults-en_US.js"></script>
    <script>
        $(document).ready(function() {
            $('#my-select').selectpicker();

            $('#my-select').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
                var $button = $('.dropdown-menu').find('[data-original-index="' + clickedIndex + '"]').find(
                    '.option-button');
                if (isSelected) {
                    $button.text('Deselect');
                } else {
                    $button.text('Select');
                }
            });

            $('.dropdown-menu').on('click', '.option-button', function(e) {
                e.stopPropagation();
                var $option = $(this).closest('.dropdown-item');
                var index = $option.attr('data-original-index');
                var $select = $('#my-select');
                var selected = $select.val() || [];

                if ($option.hasClass('selected')) {
                    $option.removeClass('selected');
                    selected = selected.filter(function(value) {
                        return value !== index;
                    });
                } else {
                    $option.addClass('selected');
                    selected.push(index);
                }

                $select.selectpicker('val', selected);
                $select.trigger('changed.bs.select', [index, $option.hasClass('selected'), selected]);
            });
        });
    </script>

    <style>
        .dropdown-item.selected {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .option-button {
            float: right;
            margin-left: 5px;
        }
    </style>
@endsection
