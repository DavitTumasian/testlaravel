@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Post </h1>

                <div>
                    <p>{{$post->body}}</p>
                    <span>{{$post->updated_at}}</span>
                    <p><b>{{$post->user->name}}</b></p>

                    <form method="post" action="{{route('save.changes'), $post->id}}">
                        <input name = 'newBody' type="text" placeholder="Input new text">
                        <input name = 'id' type="number" value="{{$post->id}}" hidden>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </form>

                    <a href="/admin"><button class="btn btn-outline-danger">Cancel</button></a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
