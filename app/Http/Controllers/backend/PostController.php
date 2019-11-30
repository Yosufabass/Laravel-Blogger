<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::all();
        return view('backend.post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::All();
        return view('backend.post.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Post::create($request->all());
        // redirect to users list with success message

        //dd($request->all());
        if ($request->hasFile('image')) {
            // upload 'avatar' image for the user
            $request['image'] = $request->file('image')->store('image');
        } else {
            // to set default value for 'avatar' if no image has been uploaded
            $request['image'] = null;
        }
        // to activate the created user by default
        $request['status'] = true;
          

         $this->validate($request ,[

            "title" => "required",
            "content" => "required",
            'category_id'=>"required",
             
          ]);

         
        // add created by details 
        $request['user_id'] = Auth::id();
        // create and insert the new user data
        Post::create($request->all());

          return redirect()->route('post.index')->with('success', 'The Post is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('backend.post.edit')->with('post',$post );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $post->title = $request->input('title');
        $post->content =$request->input('content');
        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return back()->with('status', 'post has beed deleted');
    }
}
