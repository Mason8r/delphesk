@extends('app')

@section('content')
<div class="content">
	<div class="row">
		<div class="large-10 large-offset-1 columns">
			<h3>{{$ticket['subject']}}</h3>
			@foreach($ticket['messages'] as $message)

			@if($message === reset($ticket['messages']))
				<p>Created by {{$message['user']['email']}} on {{date('l jS \of F Y \a\t h:i:s A', strtotime($message['created_at']))}}</p>
				<h4>{{$message['message']}}</h4>
			@else
				<hr />
				<p><small>Replied to on the {{date('l jS \of F Y \a\t h:i:s A', strtotime($message['created_at']))}} by {{$message['user']['email']}}</small></p>
				{{$message['message']}}</p>
			@endif
			@endforeach
			<div class="panel">
				@if($errors)
					<ul>
					@foreach ($errors->all() as $message)
						<li>{{$message}}</li>
					@endforeach
					</ul>
				@endif
				<form action="{{route('replyTicket')}}" method="POST">
					<textarea name="message" placeholder="ticket message"></textarea>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="ticket_id" value="{{ $ticket['id'] }}">
					<input type="submit" value="Post Reply" class="button" />
				</form>
			</div>
		</div>
	</div>
</div>
@endsection