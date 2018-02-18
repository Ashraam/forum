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
	
	<div class="row justify-content-center">
		@foreach($thread->replies as $reply)
		<div class="col-md-8">
			<div class="card card-default mb-4">
				<div class="card-header">
					{{ $reply->created_at->diffForHumans() }} by <a href="{{ url('users/'.$reply->user->id) }}">{{ $reply->user->name }}</a>
				</div>
				<div class="card-body">
					{!! nl2br($reply->body) !!}
				</div>
			</div>
		</div>
		@endforeach
	</div>
	
	@if(Auth()->check())
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default mb-2">
				<div class="card-header">Reply</div>
				<div class="card-body">
					<form method="post" action="{{ url($thread->path().'/replies') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<textarea name="body" id="body" class="form-control" placeholder="Réponse" rows="5">{{ old('body') }}</textarea>
						</div>
						<p class="text-right">
							<button type="submit" class="btn btn-primary">Answer</button>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>
@endsection
