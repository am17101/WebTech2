@extends('layouts.app')

@section('content')

<h1>Video Posts</h1>

	@if(count($videos)>0)
		@foreach($videos as $video)
			<div class="card bg-light p-3">
				<h3><a href="/videos/{{$video->id}}">{{$video->title}}</a></h3>
				<small>Written on {{$video->created_at}}</small>
			</div>
		@endforeach
		{{$videos->links()}}
	@else
		<p>No Posts found</p>
	@endif
@endsection
