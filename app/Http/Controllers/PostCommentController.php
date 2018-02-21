<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class PostCommentController extends Controller
{
    public function store(Request $request, $id)
    {
    	Comment::create([
    		'post_id' => $id,
    		'user_id' => auth()->id(),
    		'message' => $request->message,
    	]);

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$comment = Comment::find($id);
		$post = Post::find($comment->post_id);
    	Comment::find($id)->delete();

    	return redirect(route('post.show',compact('post')));
    }

    public function edit($id)
    {

    	$comment = Comment::find($id);
    	return view('comment.edit_comment', compact('comment'));
    }

    public function update(Request $request, $id)
    {

    	Comment::find($id)->update([
    		'message' => $request->message,
    	]);

    	$comment = Comment::find($id);
		$post = Post::find($comment->post_id);
		return view('post.show', compact('post'));
    }
}
