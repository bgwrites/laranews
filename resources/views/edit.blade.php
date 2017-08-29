@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            @if (Auth::user()->name == $id->name)    
                <div class="panel-heading">
                    <h2>Edit Post</h2>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" action="/posts/{{$id->id}}/update">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="postTitle">Title</label>
                        <input type="text" class="form-control" id="postTitle" aria-describedby="PostHelp" name="title" value="{{ $id->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="postURL">URL (Optional)</label>
                        <input type="text" class="form-control" id="postURL" aria-describedby="PostHelp" name="url" value="{{ $id->link }}">
                    </div>                    
                    <div class="form-group">
                        <label for="postBody">Body</label>
                        <textarea class="form-control" id="postBody" name="body" rows="3" required>{{ $id->body }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            @else
            <h1>You cannot edit this post!</h1>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection