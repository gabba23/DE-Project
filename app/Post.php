<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'timeofday'];
    //
    Protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // TimeStamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
