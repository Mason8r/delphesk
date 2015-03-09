@extends('app')

@section('content')
<div class="content">
	<div class="row">
		<div class="large-10 large-offset-1 columns">
			<h3><strong>Subject:</strong> {{$ticket->subject}}</h3>
			@foreach($ticket->messages as $index => $message)

			@if($index === 0)

				<p>Created by {{$message->user->email}} {{$message->created_at->diffForHumans()}}</p>
				<p><strong>Ticket Body:</strong> {{$message->message}}</p>
				<hr />

			@else

				<p><small>Replied to {{$message->created_at->diffForHumans()}} by {{$message->user->email}}</small></p>
				<p><strong>Reply:</strong> {{$message->message}}</p>
				<hr />

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