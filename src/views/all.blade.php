@extends('app')

@section('content')
<div class="content">
	<div class="row">
		<div class="large-10 large-offset-1 columns">
			<h2>All Tickets</h2>
			<div>{!!$tickets->render()!!}</div>
			@foreach($tickets as $ticket)
				<div class="panel">
					<h4>{{$ticket['subject']}}</h4>
					<p><strong>Created by {{$ticket['user']['email']}} on {{date('l jS \of F Y \a\t h:i:s A', strtotime($ticket['created_at']))}}</strong></p>
					<p>{{$ticket['messages'][0]['message']}}</p>
					<p><a href="{{route('showTicket' , $ticket['id'])}}">View/Reply</a></p>
				</div>
			@endforeach
			<div>{!!$tickets->render()!!}</div>
		</div>
	</div>
</div>
@endsection