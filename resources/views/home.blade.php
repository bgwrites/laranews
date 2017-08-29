@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Most Recent</h2>
                        <a href="/posts/create">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                New Post
                            </button>
                        </a>


                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($posts)
                        @foreach ($posts as $post)
                            @if ($post->link == "#")
                               <a href="/posts/{{ $post->id }}"><h3>{{ $post->title }}</h3></a>
                            @else
                                <a href="{{ $post->link }}"><h3>{{ $post->title }}</h3></a>
                            @endif
                            <h6>Submitted on <b>{{ date('F d, Y', strtotime($post->created_at)) }}</b> by <b>{{ $post->name }}</b></h6>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
