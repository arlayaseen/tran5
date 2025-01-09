<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Mail\NotifyUserMail;
use App\Models\Post;
use App\Models\User;
use App\Traits\BasicFunctions;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use BasicFunctions;


    public function sendNotifyUserEmail()
    {
        $data = [
            'subject' => 'Important Notification',
            'title' => 'Hello User!',
            'message' => 'This is your personalized notification message.',
        ];

        Mail::to('arlayaseen@gmail.com')->send(new NotifyUserMail($data));

        return response()->json(['message' => 'Email sent successfully!']);
    }
    public function dashboard()
    {
        $posts = Post::select('id', 'title', 'content', 'image', 'user_id')->get();
        //  $posts=Post::all();
        //$posts= Post::active()->get();
        //  $user = User::find(1);
        //  return $user->posts;
        // return     $user = User::with('roles')->findOrFail(1);
        return view('dashboard', compact('posts'));
    }

    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
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
    public function store(PostRequest $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'user_id' => 'required|exists:users,id', // Validate the user_id
        // ]);

        //  $roles=[
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'user_id' => 'required|exists:users,id', // Validate the user_id
        //  ];
        //  $messages=[
        //     'title.required'=>'title is required',
        //     'content.required'=>'content is required',
        //     'user_id.required'=>'user_id is required',
        //  ];

        // $validated = Validator::make($request->all(), $roles,$messages);
        // if( $validated ->fails()){
        //     return redirect()->back()->withErrors($validated)->withInput();

        // }

        // if ($request->hasFile('image')) {
        //      $image= $request->file('image')->store('posts', 'public');

        // }

        $fileName = $this->saveImage($request->image, 'images');

        // $file_extention=$request->image->getClientOriginalExtension();
        // $fileName=time().'.'.$file_extention;
        // $path='posts';
        // $request->image->move($path,$fileName);
        // }

        // Post::create($validated);


        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id; // Save selected user_id
        $post->image =  $fileName;
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
    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all(); // Fetch all users for the dropdown
        return view('edit', compact(['post', 'users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id', // Validate the user_id
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        if ($request->hasFile('image')) {
            // Delete old image
            $imagePath = base_path('public\images\\' . $post->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Deletes the file
            }
            $validated['image'] =  $this->saveImage($request->image, 'images');
        }

        $post->update($validated);

        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->user_id = $request->user_id; // Save selected user_id
        // $post->save();

        // return redirect()->back()->with('success', 'Post added successfully!');
        return redirect()->route('dashboard')->with([
            'message' => "تمت العملية بنجاح",
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Storage::disk('images');
        $post = Post::find($id);
        $imagePath = base_path('public\images\\' . $post->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Deletes the file
        }


        $post->delete();
        return redirect()->route('dashboard')->with([
            'message' => "تمت العملية بنجاح",
            'alert-type' => 'success'
        ]);
    }
    // public function saveImage($image,$folder){
    //     $file_extention=$image->getClientOriginalExtension();
    //       $fileName=time().'.'.$file_extention;
    //       $path=$folder;
    //       $image->move($path,$fileName);

    //       return $fileName;

    // }
}
