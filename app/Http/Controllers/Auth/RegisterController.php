<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {

    //     return Validator::make($data, [

    //         'username' => ['required', 'string', 'max:255','unique:users'],
    //         'mail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => hash::make($data['password']),
        ]);



    }


    // public function registerForm(){
    //     return view("auth.register");
    // }



    public function register(Request $request){


        if($request->isMethod('post')){

            $validatedData = $request->validate([
            'username' => ['bail','required', 'string', 'max:5','unique:users'],
            'mail' => ['bail','required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['bail','required', 'string', 'min:8','same:password_confirmed'],

        ]);
            $data = $request->input();
            $this->create($data);

        return redirect('/added')->with($request->all('username'));

        }

        return view('auth.register');
    }


    // public function register(Request $request) {

    //     $validator = validator::make($request->all(),[
    //         'username' => ['required', 'string', 'max:255','unique:users'],
    //         'mail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    //     if($validator->fails()){
    //         return redirect('auth.register')
    //         ->withError($validator)
    //         ->withInput();
    //     }else{
    //         $data = $request->input();
    //         $this->create($data);

    //         return redirect('/added')->with($request->all('username'));
    //     }
    // }

    public function added(Request $request){



        return view('auth.added');


    }

}
