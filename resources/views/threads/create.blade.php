@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">New thread</div>
				<div class="card-body">
                    @include('partials._errors')
					<form method="post" action="{{ url('threads') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="control-label" for="channel_id">Channel</label>
							<select name="channel_id" id="channel_id" class="form-control" required>
                                <option>Select a channel</option>
								@foreach($channels as $channel)
								<option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Title</label>
							<input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ old('title') }}" required />
						</div>
						<div class="form-group">
							<label for="body">Body</label>
							<textarea name="body" id="body" class="form-control" placeholder="Body" required>{{ old('body') }}</textarea>
						</div>
						<button type="submit" class="btn btn-primary">Create</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
