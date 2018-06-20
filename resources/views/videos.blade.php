@extends('layouts.app')

@section('content')

<h1>Posts</h1>

	@if(count($videos)>0)
		@foreach($videos as $video)
			<div class="card bg-light p-3">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img style="width:100%" src="/storage/cover_images/{{$video->cover_image}}">
					</div>
					<div class="col-md-4 col-sm-4">
						<h3><a href="/videos/{{$video->id}}">{{$video->title}}</a></h3>
						<small>Written on {{$video->created_at}}</small>
					</div>
				</div>
				
			</div>
		@endforeach
		{{$videos->links()}}
	@else
		<p>No Posts found</p>
	@endif
@endsection
