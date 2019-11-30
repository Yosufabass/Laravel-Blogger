<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

     protected $fillable =['title', 'content', 'user_id','imge', 'category_id'];

     
    public function category(){

        return $this->belongssTo(category::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}