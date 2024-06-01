<?php

namespace App\Http\Controllers;

use app\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request, $id){
        // request()->validate([
        //     'name' => 'required|string|min:2|max:100',
        //     'email' => 'required|email|unique:users,email'.$id.',id',
        //     'old_password' => 'nullable|string',
        //     'password' => 'nullable|required_with:old_password|string|confirmed|min:6'

        // ]);

        request()->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6',
            
        ]);


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('old_password')){
            if(Hash::check($request->old_password, $user->password)){
                $user->update([
                   'password' => Hash::make($request->password)
                ]);
            }else {
                return back()
                ->withErrors(['old_password' => __('Tolong periksa passwordnya lagi')])
                ->withInput();
            }
        }

        if(request()->hasFile('foto')){
            if($user->foto && file_exists(storage_path('app/public/fotos'))){
                Storage::delete('app/public/fotos'.$user->foto);
            }
            $file = $request->file('foto');
            $fileName = $file->getClientOriginalName().'.'.$file->getClientOriginalExtension();
            $request->foto->move(storage_path('app/public/fotos/'), $fileName);
            // $request->foto->move(storage('app/public/fotos/'), $fileName);
            $user->foto = $fileName;
        }
        $user->role = $request->role;
        $user->save();

        return back()->with('status','Profile Terupdate');


    }

}