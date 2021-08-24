<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id', 'text', 'updated_at','id'];

    public function user(){

        return $this->belongsTo('App\User');
    }


}
