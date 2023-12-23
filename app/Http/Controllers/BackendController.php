<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class BackendController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function all_users(){
        $users = User::all();
        return view('backend.users.all_users' , compact('users'));
    }

    public function delete($id){
        $users = User::find($id);
        $users->delete();

        return redirect()->route('dashboard.users.all_users')->with('message' , 'the user is deleted successfuly');

    }
}
