<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    //primary key
    public $primarykey = 'id' ;
    //timestamps
    public $timestamps = true;
    protected $fillable = ['title', 'body', 'user_id', 'cover_image'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
