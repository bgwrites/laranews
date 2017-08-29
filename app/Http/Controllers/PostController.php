<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
    	return view('submit');
    }

    public function store()
    {
    	$userid = Auth::user()->id;
    	$username = Auth::user()->name;
    	if (request('url') != ""){
    		$link = request('url');
    	}else{
    		$link = "#";
    	}

    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required'
    	]);

    	Post::create([
    		'user_id' => $userid,
    		'name' => $username,
    		'title' => request('title'),
    		'body' => request('body'),
    		'link' => $link
    	]);

    	return redirect('/');
    }   

    public function single(Post $id)
    {
    	return view('single', compact('id'));
    }  

    public function delete(Post $id)
    {
    	$id->delete();
    	return redirect('/');
    }    

    public function edit(Post $id)
    {
    	return view('edit', compact('id'));
    }   

    public function update(Post $id)
    {
    	$post = Post::find($id->id);
    	$post->title = request('title');
    	$post->body = request('body');
    	$post->link = request('url');
    	$post->save();

    	return redirect('/');

    }               

}
