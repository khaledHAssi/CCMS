@extends('admin.master')

@php
    $title = "Edit Evaluation"
@endphp

@section('title', $title)

@section('styles')

<style>
    .questions_wrapper div {
    position: relative;
}

.questions_wrapper div span {
    width: 20px;
    height: 20px;
    background: #333;
    display: flex;
    justify-content: center;
    /* align-items: center; */
    color: #fff;
    font-size: 36px;
    line-height: 14px;
    border-radius: 50px;
    cursor: pointer;
    position: absolute;
    right: 8px;
    top: 8px;
    display: none;
}

.questions_wrapper div:hover span {
    display: flex;
}
.questions_wrapper div span:hover {
    background: #f00;
}

</style>

@stop

@section('content')

<div class="content">
  <div class="container-fluid">
    <div class="card mt-4">
        <div class="card-body">
            <h1>{{ $title }}</h1>
            <form action="{{ route('admin.evaluations.update', $evaluation) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror " value="{{ old('name', $evaluation->name) }}" />
                    @error('name')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="type">Type</label>
                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                        <option @selected(old('type', $evaluation->type) == 'Student') value="Student">Student</option>
                        <option @selected(old('type', $evaluation->type) == 'Company') value="Company">Company</option>
                    </select>
                    @error('type')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>

                <div class="questions_wrapper">
                    @foreach ($evaluation->questions as $q)
                    <div>
                        <input type="text" name="questions[{{ $q->id }}]" class="form-control mb-2" placeholder="Question" value="{{ $q->question }}" />
                        <span class="remove_question">-</span>
                    </div>
                    @endforeach
                </div>

                <button id="add_question" class="btn btn-sm btn-success"> <i class="fas fa-plus"></i> Add</button>

                <br>
                <br>

                <button class="btn btn-success px-5"><i class="fas fa-save"></i> Edit</button>

            </form>
        </div>
    </div>
  </div>
</div>

@stop

@section('scripts')
<script>

    // jQuery
    $('#add_question').click(function(e) {
        e.preventDefault();

        let q = `<div>
                    <input type="text" name="questions[]" class="form-control mb-2" placeholder="Question"/>
                    <span class="remove_question">-</span>
                </div>`;

        $('.questions_wrapper').append(q);

    });

    $('.questions_wrapper').on('click', '.remove_question', function() {
        $(this).parent().remove();
    })

    // ES6
    // document.querySelector('#add_question').onclick = (e) => {
    //     e.preventDefault();
    // }
</script>
@stop
