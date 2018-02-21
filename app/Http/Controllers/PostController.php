<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		$posts = Post::all();

		return view('post.index', compact('posts'));
	}

    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    public function create()
    {
    	$categories = Category::all();
    	return view('post.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $this->validate(request(),[
            'title' => 'required',
            'content' => 'required',
        ]);

    	Post::create([
    		'title' => $request->title,
    		'content' => $request->content,
    		'category_id' => $request->category_id,
    	]);

    	return redirect(route('post.index'));
    }

    public function edit($id)
    {
    	$post = Post::find($id);
    	$categories = Category::all();

    	return view('post.edit', compact('post','categories'));
    }

    public function update(Request $request)
    {
    	Post::find($request->id)->update([
    		'title' => $request->title,
    		'content' => $request->content,
    		'category_id' => $request->category_id,
    	]);

    	return redirect(route('post.index'));
    }

    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();
        return redirect(route('post.index'));
    }
}
