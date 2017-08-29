@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ $id->title }}</h2>
                    <p>Author: <b>{{ $id->name }}</b>
                    @if (Auth::user()->name == $id->name)                    
                    <a href="/posts/{{ $id->id }}/edit">Edit</a> <a data-toggle="modal" data-target="#myModal">Delete</a>                                     
                    @endif
                    </p>  
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to delete this post? This can not be undone!
                      </div>
                      <div class="modal-footer">
                        <form action="{{ url('posts/'.$id->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel-body">
                <p>{{ $id->body }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
