<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        //validate data
        $request->validate([
            'id' => 'required|unique:users|min:8|max:9',
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|unique:users|min:6',
            'password_confirmation' => 'required'
        ]);
        //create instance
        $user = new User();
        //asigned data
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //create user
        $user->save();

        return redirect()->route('login');
    }
}
