<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

     $posts=Post::orderBy('created_at','desc')->first();
     $posts2=Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
     $posts3=Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
     $posts4=Post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first();
     $categories=Category::All();
     $tags=Tag::All();
     $users=User::All();
     return view('frontend.index')->with('posts',$posts)->
                                    with('categories',$categories)-> 
                                    with('tags',$tags)->
                                    with('posts2',$posts2)->
                                    with('posts3',$posts3)->
                                    with('posts4',$posts4)->
                                    with('laravel',  Category::find(1))->
                                    with('php',  Category::find(3))->
                                    with('users',$users);

    }

    public function show($id){
     $post=Post::find($id);
     $posts=Post::orderBy('created_at','desc')->first();
     $posts2=Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
     $posts3=Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
     $posts4=Post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first();
     $categories=Category::All();
     $tags=Tag::All();
     $users=User::All();
      return view('frontend.blank')->with('posts',$posts)->
                                        with('categories',$categories)-> 
                                        with('tags',$tags)->
                                        with('posts2',$posts2)->
                                        with('posts3',$posts3)->
                                        with('posts4',$posts4)->
                                        with('post',$post)->
                                        with('laravel',  Category::find(1))->
                                        with('php',  Category::find(3))->
                                        with('users',$users);

    }
    
}
