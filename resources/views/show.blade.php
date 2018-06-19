@extends('layouts.app')

@section('content')
<hr>
<a href="/videos" class="btn btn-default">Go Back</a>
<h1>{{$video->title}}</h1>
<img style="width:100%" src="/storage/cover_images/{{$video->cover_image}}">
<br><br>
<div>
	{!! $video->body !!}
</div>
<hr>
<small>Created on {{$video->created_at}}</small>
<hr>
@if(!Auth::guest())
	@if(Auth::user()->id == $video->user_id)
		<a href="/videos/{{$video->id}}/edit" class="btn btn-default">Edit</a>
			{!!Form::open(['action'=> ['PostsController@destroy', $video->id], 'method'=>'POST', 'class'=>'float-right'])!!}
				{{Form::hidden('_method', 'DELETE')}}
				{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
			{!!Form::close()!!}
	@endif
@endif
@endsection
