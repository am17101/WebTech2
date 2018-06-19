@extends('layouts.app')

@section('content')

	<h1>Create post</h1>
	{!! Form::open(['action' => 'PostsController@store', 'method'=>'POST']) !!}
		<div class="form-group">
			{{Form::label('title', 'Title')}}
			{{Form::text('title', '',['class'=> 'form-control', 'placeholde'=>'Title'])}}
		</div>
		<div class="form-group">
			{{Form::label('body', 'Body')}}
			{{Form::textarea('body', '',['id' => 'ckeditor-textarea','class'=> 'form-control', 'placeholde'=>'Body Text'])}}
		</div>
		{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}
@endsection