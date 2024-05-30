<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        $userAll = User::all();
        return view('admin.user.index', compact('userAll'));
    }

    public function activate(User $user){
        $user->is_active = true;
        $user->save();

        return redirect('admin/user')->with('success','User Behasil Diaktifkan');
    }

    public function showProfile(){
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));
    }

}
