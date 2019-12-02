<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

     protected $fillable =['title', 'content', 'user_id','imge', 'category_id'];


     public function eetImgeAtrribute($imge){

        return asset($imge);

    }
     
    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tag(){

        return $this->belongsToMany(Tag::class);
    }
}
