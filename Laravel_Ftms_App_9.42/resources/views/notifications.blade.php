@extends('site.master')

@section('content')

    <div class="container my-5">
        <h1>All Notifications</h1>

        <div class="list-group">
        @foreach ($user->notifications as $notify)
        <a href="{{ route('mark-read', $notify->id) }}" class="list-group-item list-group-item-action {{ $notify->read_at ? '' : 'active' }} " aria-current="true">
            {{-- @dump($notify->data['msg']) --}}
            {{ $notify->data['msg'] }}
          </a>
        @endforeach
    </div>

    </div>

@stop
