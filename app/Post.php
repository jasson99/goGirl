<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Post extends Model
{
    //Table name
    protected $table = 'posts';

    //Primary key
    public $primaryKey = 'id';

    //TimeStamps
    public $timestamps = true;

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

   // public function addComment($body)
    //{
      //  
       // $this->comments()->create(compact('body'));
 //   }

     public function user(){ 

        return $this->belongsTo(User::class);
    }

    
}
