<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();

        return view('posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // Fetch all users for the dropdown
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id', // Validate the user_id
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id; // Save selected user_id
        $post->save();
        // return redirect()->back()->with('success', 'Post added successfully!');
        return redirect()->back()->with([
            'message' => "تمت العملية بنجاح",
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $post=Post::find($id);
        $users = User::all(); // Fetch all users for the dropdown
        return view('edit',compact(['post','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id', // Validate the user_id
        ]);
        $post=Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id; // Save selected user_id
        $post->save();

        // return redirect()->back()->with('success', 'Post added successfully!');
        return redirect()->route('posts.index')->with([
            'message' => "تمت العملية بنجاح",
            'alert-type' => 'success'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with([
            'message' => "تمت العملية بنجاح",
            'alert-type' => 'success'
        ]);

    }
}
