<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('frontend.register');
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:16|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
        ]);

        // $data['password'] = bcrypt($data['password']);
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'user';
        
        $user = User::create($data);

        // $request->session()->flash('success', 'Registration successful! Please login');
        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
