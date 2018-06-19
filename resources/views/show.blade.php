@extends('layouts.app')

@section('content')
<hr>
<a href="/videos" class="btn btn-default">Go Back</a>
<h1>{{$video->title}}</h1>

<div>
	{!! $video->body !!}
</div>
<hr>
<small>Created on {{$video->created_at}}</small>
@endsection
