@extends('layouts.app')

@section('content')

<h1>Messages</h1>
<h2>Should not be public</h2>
@if(count($messages)>0)
	@foreach($messages as $message)
		<ul class="list-group">
			<li class="list-group-item">Name: {{$message->name}}</li>
			<li class="list-group-item">Email: {{$message->email}}</li>
			<li class="list-group-item">Message: {{$message->messages}}</li>
		</ul>
	@endforeach
@endif

@endsection