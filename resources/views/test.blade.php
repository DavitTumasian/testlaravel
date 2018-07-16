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

                                @if($post->canDelete())
                                    <a href="{{route('post.delete', $post->id)}}"><button class="btn btn-outline-danger">Delete</button></a>
                                @endif

                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                            <form method="post" action="{{route('post.add')}}">
                                    <input name = 'body' type="text">
                                    {{csrf_field()}}
                                    <button type="submit">Add Post</button>
                            </form>
                            @if ($errors->any())
                                    <div class="alert alert-danger">
                                            <ul>
                                                    @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                    @endforeach
                                            </ul>
                                    </div>
                            @endif
                    </div>
            </div>
    </div>
@endsection
