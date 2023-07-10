@extends('admin.master')

@section('title', 'Dashboard')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 style="font-weight: bold">{{ env('APP_FULL_NAME') }}</h1>
        </div>
    </div>
@stop
