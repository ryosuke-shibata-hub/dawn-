<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use Auth;
use store;
use Illuminate\Support\Facades\Hash;
use App\follows;
use App\Http\Controllers\Controller;

use \InterventionImage;


class UsersController extends Controller

{


    //

    public function profile(Request $request,Follows $follows){

        $auth = Auth::user();

        $list = \DB::table('users')
        ->first();


        $login_user = auth()->user();

        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);



        return view('users.profile')->with('auth',$auth)->with('list',$list)->with('follow_count',$follow_count)->with('follower_count',$follower_count);
    }
    // public function search(){

    //     $users = User::all();
    //     return view('users.search')->with('users', $users);
    // }

     public function profileUpdate(Request $request) {


        // if($request->isMethod('POST'))
        // {
        //     $path = $request->file('file_name')->store('public/img');
        //     $image = User::find(\Auth::id());
        //     $image->image = basename($path); //imageカラムに保存
        //     $image->save();
        // }


        $id = $request->input('id');

        $auth = User::find($id);

        $form = $request->all();


        unset($form['_token']);

        foreach ($form as $key => $value) {
            if($value == null) {
                unset($form[$key]);
            }}

            if (isset($form['password'])) {

            $form['password'] = Hash::make($form['password']);

                }


            $auth->fill($form)->save();

            if($file = $request->file_name){

            $fileName = time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('public/uploads.img');
            InterventionImage::make($file)
	        ->fit(100, 100)
	        ->save($file);
            $file->move($target_path,$fileName);
            // $auth->fill($file)->save();
            \DB::table('users')
            ->where('id',$id)
            ->update([


                'images' => $fileName,

        ]);
            }else{
                // $fileName = "dawn.png";
                $file = $request->file_name;
                unset($file['_token']);


            foreach ((array)$file as $key => $value) {
            if($value == null) {
                unset($file[$key]);
                $auth->fill($file);
                $auth->fill($file)->save();
            }}

            }


        // $nameData = $request->input('username');
        // $mailData = $request->input('mail');
        // $passData = $request->input('password');

        $bio = $request->input('bio');

        if($bio !== null){

            $id = $request->input('id');

            \DB::table('users')
            ->where('id',$id)
            ->update([
                'bio' => $bio,
        ]);
        }else{
            $bio = $request->bio;
                unset($bio['_token']);
                foreach ((array)$bio as $key => $value) {
            if($value == null) {
                unset($bio[$key]);
                $auth->fill($bio);
                $auth->fill($bio)->save();
        }}}




            $validatedData = $request->validate([
             'username' => ['nullable','string','max:8','unique:users'],
             'mail' => ['nullable','string','max:100','unique:users'],
             'password' => ['nullable',
                'string','min:8'],
             'images' =>['nullable','bali',]
         ]);



        // \DB::table('users')
        //     ->where('id',$id)
        //     ->update([

        //         'bio' => $bioData,
        //         'images' => $fileName,

        // ]);

        return redirect('profile');
    }




    public function searchUsers(Request $request,User $user,Follows $follows) {

        $auth = Auth::user();

        // $user = User::where('id' , '!=' , Auth::user());

        // $search_users = $user->getAllUsers(auth()->user()->id);

        $name = $request->input('search_users');

        $search_users = $request->input('search_users');

        $query = User::query();

        if(!empty($search_users)){
            $query->where('username','like',"%{$search_users}%");
        }

        $search = $query->where("id" , "!=" , Auth::user()->id)
        ->get();

        $login_user = auth()->user();

        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);

        return view('users.search')->with('name', $name)->with('auth',$auth)->with('search',$search)->with('follow_count',$follow_count)->with('follower_count',$follower_count);

}

    public function searchTweet(Request $request,User $user,Follows $follows) {

        $auth = Auth::user();

        $search_users = $request->input('search_users');

        $name = $request->input('search_users');



        // $query = Post::query();

        $query = post::query();


        // if(!empty($search_users)){
        //     $query->where('posts','like',"%{$search_users}%");
        // }

        if(!empty($search_users)){
            $query->where('posts','like',"%{$search_users}%");
        }

        $search_users = $query
        ->leftJoin('users' , 'posts.user_id', '=', 'users.id')
        ->where("user_id" , "!=" , Auth::user()->id)

        ->get();

        // $list = \DB::table('posts')
        // ->leftJoin('users' , 'posts.user_id', '=', 'users.id')
        // ->get();

        $follow = \DB::table('follows')
        ->first();

        $login_user = auth()->user();


        $follow_count = $follows->getFollowCount($login_user->id);
        $follower_count = $follows->getFollowerCount($login_user->id);

        return view('users.searchTweet')->with('search_users', $search_users)->with('name', $name)->with('follow', $follow)->with('auth',$auth)->with('follow_count',$follow_count)->with('follower_count',$follower_count);
    }



    public function follow(User $user,$id) {

        $follower = auth()->user();

        $user = User::find($id);

        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            $follower->follow($user->id);

            return back();
        }
    }

    public function unfollow(User $user,$id) {

        $follower = auth()->user();

        $user = User::find($id);

        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            $follower->unfollow($user->id);

            return back();
        }
    }


}
