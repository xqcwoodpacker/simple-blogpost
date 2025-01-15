<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return $request;
        if ($request->has('category')) {
            $posts = Post::where('category_id', '=', $request->category)->orderBy('created_at', 'desc')->paginate(5);
        } else if ($request->has('keyword')) {
            $posts = Post::where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('content', 'like', '%' . $request->keyword . '%')
                ->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $posts = Post::with(['user', 'comments', 'category'])->orderBy('created_at', 'desc')->paginate(5);
        }
        $categories = Category::all();
        return view('home', compact(['posts', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('addpost', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:30',
            'content' => 'required | min:10',
        ], [
            'title.required' => 'Title is required',
            'title.max' => 'Title should not be more than 30 characters',
            'content.required' => 'Content is required',
            'content.min' => 'Content should be atleast 10 characters',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->user_id = auth()->user()->id;
        if ($post->save()) {
            return redirect()->route('home')->with('success', 'Post added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add post');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', '=', $post->id)->orderBy('created_at', 'desc')->get();
        return view('post', compact(['post', 'comments']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('editpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:30',
            'content' => 'required | min:10',
        ], [
            'title.required' => 'Title is required',
            'title.max' => 'Title should not be more than 30 characters',
            'content.required' => 'Content is required',
            'content.min' => 'Content should be atleast 10 characters',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        if ($post->save()) {
            return redirect()->route('profile')->with('success', 'Post updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update post');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return redirect()->route('profile')->with('success', 'Post deleted successfully');
        }
    }
}
