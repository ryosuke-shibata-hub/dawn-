<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ValController extends Controller
{
    //

    public function val(Request $request){

        $rules = [
            'username' => ['required', 'string', 'max:255'],
            'mail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $validator = Validator::make($request->all(), $rules);
        $validated = $validator->validate();

        return view('auth.added')->with(['validated'=>$validated]);
    }
}
