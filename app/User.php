<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','user_id', 'text', 'updated_at','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany('App\Post');
    }



    public function follow(Int $user_id) {

        return $this->follows()->attach($user_id);
    }

    public function unfollow(Int $user_id) {
        return $this->follows()->detach($user_id);
    }

    public function isFollowing(Int $user_id) {
        return (boolean) $this->follows()->where('follow',$user_id)->first(['id']);
    }

    public function is_Followed(Int $user_id) {
        return (boolean) $this->followers()->where('follower',$user_id)->first(['id']);
    }

    public function followers() {
        return $this->belongsToMany(self::class,'follows','follow','follower');
    }

    public function follows() {
        return $this->belongsToMany(self::class,'follows','follower','follow');
    }






}
