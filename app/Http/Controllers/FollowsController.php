<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\follows;
use Auth;


class FollowsController extends Controller
{



    // public function follow(User $user) {
    //     $follower = auth()->user();

    //     $is_following = $follower->isFollowing($user->id);
    //     if(!$is_Following) {
    //         $follower->follow($user->id);

    //         return back();
    //     }
    // }

    // public function unfollow(User $user) {

    //     $follower = auth()->user();

    //     $is_following = $follower->isFollowing($user->id);
    //     if($is_following) {
    //         $follower->unfollow($user->id);

    //         return back();
    //     }
    // }

    public function followList(follows $follows){

        $auth = Auth::user();

        $list = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->whereIn('user_id',Auth::user()->follows()->pluck('follow'))
        ->groupBy('users.id')
        ->orderBy('posts.id','desc','created_at','desc')->get();

        $list_follow = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->whereIn('user_id',Auth::user()->follows()->pluck('follow'))
        ->orderBy('posts.id','desc','created_at','desc')->get();

        $login_user = auth()->user();

        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);

        $text = \DB::table('posts')
        ->leftJoin('users' , 'posts.user_id', '=', 'users.id')
        ->first();

        return view('follows.followList',['list' => $list, 'list_follow' => $list_follow,'auth'=>$auth,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);
    }
    public function followerList(follows $follows){

        $auth = Auth::user();

        $list = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->whereIn('user_id',Auth::user()->followers()->pluck('follower'))
        ->groupBy('user_id')
        ->latest('posts.created_at')->get();

        $list_follow = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->whereIn('user_id',Auth::user()->followers()->pluck('follower'))
        ->latest('posts.created_at')->get();


        $login_user = auth()->user();

        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);


        return view('follows.followerList',['list' => $list, 'list_follow' => $list_follow,'auth'=>$auth,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);

    }


    public function profile_list(Request $request, $id, follows $follows) {

        $user_id = \DB::table('users')
        ->where('id','=',$id)
        ->first();

        $user_profile = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->where('users.id','=',$id)
        ->orderBy('posts.id','desc','created_at','desc')->get();

        $auth = Auth::user();

        $list = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->orderBy('posts.id','desc','created_at','desc')->get();

         $login_user = auth()->user();

        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);


        return view('users.UserProfile',['list' => $list, 'auth'=>$auth, 'user_profile' => $user_profile, 'user_id'=>$user_id,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);

    }

    // public function profile_list2(Request $request, $id, follows $follows) {

    //     $user_id = \DB::table('users')
    //     ->where('id','=',$id)
    //     ->first();

    //     $user_profile = \DB::table('users')
    //     ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
    //     ->where('users.id','=',$id)
    //     ->get();

    //     $auth = Auth::user();

    //     $list = \DB::table('users')
    //     ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
    //     ->get();

    //      $login_user = auth()->user();

    //     $follow_count = $follows->getFollowCount($login_user->id);
    //     $follower_count = $follows->getFollowerCount($login_user->id);


    //     return view('users.profile2',['list' => $list, 'auth'=>$auth, 'user_profile' => $user_profile, 'user_id'=>$user_id,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);

    // }

    // public function store($id) {
    //     \Auth::user()->follow($id);
    //     return back();
    // }

    // public function destroy($id) {
    //     \Auth::user()->unfollow($id);
    //     return back();
    // }

}
