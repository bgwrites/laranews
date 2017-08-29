@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Create New Post</h2>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" action="/posts">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="postTitle">Title</label>
                        <input type="text" class="form-control" id="postTitle" aria-describedby="PostHelp" name="title" placeholder="Post Title" required>
                    </div>
                    <div class="form-group">
                        <label for="postURL">URL (Optional)</label>
                        <input type="text" class="form-control" id="postURL" aria-describedby="PostHelp" name="url" placeholder="Post Title">
                    </div>                    
                    <div class="form-group">
                        <label for="postBody">Body</label>
                        <textarea class="form-control" id="postBody" name="body" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @if (count($errors))
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection