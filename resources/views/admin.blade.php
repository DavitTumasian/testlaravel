@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Posts </h1>

                <div>
                    @foreach($posts as $post)
                        <p>{{$post->body}}</p>
                        <span>{{$post->updated_at}}</span>
                        <p><b>{{$post->user->name}}</b></p>
                        <a href="/admin/edit/{{$post->id}}"><button class="btn btn-outline-warning">Edit</button></a>
                        <a href="/admin/delete/{{$post->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                        <hr>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
