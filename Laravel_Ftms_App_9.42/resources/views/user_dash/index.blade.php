@extends('admin.master')

@section('title', 'Dashboard')

@section('notification')
    <a href="#" style="inlineblock" class="dropdown-item" style="">
        @foreach ($jsondata as $key => $notification)
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i>
                {{ $notification['data']['msg'] }}
            </a>
        @endforeach
    </a>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 style="font-weight: bold">{{ env('APP_FULL_NAME') }}</h1>
        </div>
    </div>

@stop
