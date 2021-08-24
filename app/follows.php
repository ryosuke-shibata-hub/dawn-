<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class follows extends Model
{
    //
    // protected $fillable = ['follow','follower'];
    // protected $table = 'follows';

    // public $timestamps = false;
    // public $incrementing = false;

     protected $primaryKey = [
        'follow',
        'follower'
    ];
    protected $fillable = [
        'follow',
        'follower'
    ];
    public $timestamps = false;
    public $incrementing = false;

    public function getFollowCount($user_id) {
        return $this->where('follow',$user_id)->count();
    }

    public function getFollowerCount($user_id) {
        return $this->where('follower',$user_id)->count();
    }


}
