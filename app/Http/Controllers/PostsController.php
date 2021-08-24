<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\follows;
use Auth;
use Carbon\Carbon;



class PostsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }



    public function index(User $user,Follows $follows){

        // $count_followings = $user->followings()->count();
        // $count_followers = $user->followers()->count();


        $auth = Auth::user();

        // $follow_ids = $follows->followingIds($user->id);
        // $following_ids = $follow_ids->pluck('follow')->toArray();

        // $timelines = $user->getTimelines($user->id,$following_ids);



        $list = \DB::table('users')
        ->leftJoin('posts' , 'users.id', '=', 'posts.user_id')
        ->whereIn('user_id',Auth::user()->follows()->pluck('follow'))
        ->orWhere('user_id', Auth::user()->id)
        ->orderBy('posts.id','desc','created_at','desc')->get();



        $login_user = auth()->user();

        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);

        return view('posts.index',['list' => $list,'auth'=>$auth,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);
    }

    public function create(Request $request) {

         $post = $request->input('newPost');
         $now = carbon::now();

         $validatedData = $request->validate([
             'newPost' => ['bail','max:150'],
         ]);

        \DB::table('posts')->insert([
            'posts' => $post,
            'user_id' => Auth::user()->id,
            'updated_at' => Auth::user()->updated_at,
            'created_at' => Auth::user()->created_at,
        ]);

        return redirect('top');
    }


    public function delete($id) {
            \DB::table('posts')
                ->where('id', $id)
                ->delete();

                return redirect('top');
        }

    public function updateUp(Request $request) {


            $posts_id = $request->input('updateId');
            $post = $request->input('updatePost');

            $validatedData = $request->validate([
             'updatePost' => ['bail','max:150'],
         ]);

            \DB::table('posts')
                ->where('id', $posts_id)

                ->update([
                'posts' => $post

                ]);

            return redirect('top');
        }


        // public function edit(Request $request,$id) {
        //     $user_id = $request->user()->id;
        //     $posts = $request->input('upPost');
        //     $post = \DB::table('posts')
        //         ->where('id',$user_id)
        //         ->update([
        //             'posts' => $posts
        //         ]);

        //     return redirect('top');
        // }


        // public function update($id) {

        //     $user = User::all();
        //     $post = Post::find($id);

        //     return view('posts.index',compact('user','post'));
        // }

        // public function edit(Request $request, $id) {
        //     $edit = [
        //         $request->user()->id,
        //         $request->input('upPost')
        //     ];



        //     Post::where('id',$id)->update($edit);

        //     return redirect('top');
        // }
    // public function updateUp(Request $request, $id) {

    //     $op = $request->$id;
    //     dd($op);
    // }



// public function follow(User $user) {
//             $follower = auth()->user();
//             $is_following = $follower->isFollowing($user->id);

//             if(!$is_following) {
//                 $follower->follow($user->id);

//                 return back();
//             }
//         }

//         public function unfollow(User $user) {

//             $follower = auth()->user();
//             $is_following = $follower->isFollowing($user->id);

//             if($is_following) {

//                 $follower->unfollow($user->id);

//                 return back();
//             }
//         }

}
