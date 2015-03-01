@extends('app')

@section('content')
<div class="content">
	<div class="row">
		<div class="large-10 large-offset-1 columns">
			<h2>{{$ticket['subject']}}</h2>
			<ul>
				@foreach($ticket['messages'] as $message)
				<li>{{$message['user']['email']}}
					<ul>
						<li>{{$message['created_at']}}</li>
						<li>{{$message['message']}}</li>
					</ul>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endsection