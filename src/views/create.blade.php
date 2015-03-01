@extends('app')

@section('content')
<div class="content">
	<div class="row">
		<div class="large-10 large-offset-1 columns">
			<h2>Create new ticket</h2>
			@if($errors)
				<ul>
				@foreach ($errors->all() as $message)
					<li>{{$message}}</li>
				@endforeach
				</ul>
			@endif
			<form action="{{url('/delphesk/create')}}" method="POST">
				<input type="text" name="subject" placeholder="subject" />
				<textarea name="message" placeholder="ticket message"></textarea>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="submit" value="Create Ticket" class="button" />
			</form>
		</div>
	</div>
</div>
@endsection