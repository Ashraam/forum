@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $thread->title }}</div>

                <div class="card-body">
                   <p>{{ $thread->body }}</p>
                </div>
            </div>
        </div>
    </div>

    @foreach($thread->replies as $reply)
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card card-default mb-2">
          <div class="card-header">{{ $reply->created_at->diffForHumans() }} by <a href="{{ url('users/'.$reply->user->id) }}">{{ $reply->user->name }}</a></div>
          <div class="card-body">
             {{ $reply->body }}
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
