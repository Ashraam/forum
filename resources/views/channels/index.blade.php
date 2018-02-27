@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $channel->name }}</div>

                <div class="card-body">
                   <ul>
                        @foreach($channel->threads as $thread)
                       <li><a href="{{ url($thread->path()) }}">{{ $thread->title }}</a></li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
