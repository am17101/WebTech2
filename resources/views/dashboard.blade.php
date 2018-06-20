@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   
                   <a href="/videos/create" class="btn btn-primary">Create Post</a>
                   @can('isAdmin')
                          <a class="btn btn-primary" href="/messages">Messages</a>
                          <a class="btn btn-primary" href="/twitterUserTimeLine">Send tweet</a>
                    @endcan

                   <hr>

                    <h3>Posts Created by You</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{$video->title}}</td>
                                <td><a href="/videos/{{$video->id}}/edit" class="btn btn-default">Edit</a></td>
                                <td>
                                    {!!Form::open(['action'=> ['PostsController@destroy', $video->id], 'method'=>'POST', 'class'=>'float-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
