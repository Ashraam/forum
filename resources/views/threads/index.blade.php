@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Threads</div>

                <div class="card-body">
                   <ul>
                        @foreach($threads as $thread)
                       <li><a href="{{ url('threads/'.$thread->id) }}">{{ $thread->title }}</a></li>
                       @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
