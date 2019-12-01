<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
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
        $tags=Tag::all();
        return view('backend.post.create')->with('categories',$categories)->
        with('tags',$tags);
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
      
         $this->validate($request ,[

            "title" => "required",
            "content" => "required",
            'category_id'=>"required",
             
          ]);
          $imge = $request->imge;
          $imge_new_name = time().$imge->getClientOriginalName();
          $imge->move('uploads/posts/',$imge_new_name);
         
        // add created by details 
                // $request['user_id'] = Auth::id();
        // create and insert the new user data
        $post = Post::create([
            "title"    => $request->title,
            "content"  => $request->content,
            "category_id"  => $request->category_id,
            "imge" => 'uploads/posts/'.$imge_new_name,
            
            "user_id" => Auth::id()
        ]);
        $post->tag()->attach($request->tag_id);

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
        $tags=Tag::All();
        $categories=Category::All();
        $post=Post::find($id);
        return view('backend.post.edit')->with('post',$post )->with('categories',$categories )->
        with('tags',$tags);
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
       
        $this->validate($request ,[

            "title" => "required",
            "content" => "required",
            'category_id'=>"required",
             
          ]);


          if ( $request->hasFile('imge')  ) {
            $imge = $request->imge;
            $imge_new_name = time().$imge->getClientOriginalName();
            $imge->move('uploads/posts/',$imge_new_name);
           
            $post->imge = 'uploads/posts/'.$imge_new_name;
        }


        
        $post->title = $request->input('title');
        $post->content =$request->input('content');
       
        $post->save();

        return redirect()->route('post.index')->with('status', 'The Post is updated');
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
