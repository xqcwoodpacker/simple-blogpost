<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'content' => 'required',
        ], [
            'content.required' => 'Please enter a comment',
        ]);
        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->content = $request->content;
        if ($comment->save()) {
            return redirect()->route('post', ['post' => $id])->with('success', 'Comment added successfully');
        } else {
            return redirect()->route('post', ['post' => $id])->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('editcomment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // dd($comment);

        $request->validate([
            'content' => 'required',
        ], [
            'content.required' => 'Please enter a comment',
        ]);

        $comment->content = $request->content;
        if ($comment->save()) {
            return redirect()->route('post', ['post' => $comment->post_id])->with('success', 'Comment updated successfuly');
        } else {
            return redirect()->route('post', ['post' => $comment->post_id])->with('error', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if ($comment->delete()) {
            return redirect()->back()->with('success', 'Comment deleted successfuly');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
