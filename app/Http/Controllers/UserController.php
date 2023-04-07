<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
//        dd($request['avatar']);
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->year_of_birth = $request['year_of_birth'];
        $user->email = $request['email'];
        if($request->hasFile('avatar')) {
            if(file_exists(public_path('/storage/'.$user->avatar))) {
                unlink(public_path('/storage/'.$user->avatar));
            }
            $user->avatar = $request['avatar']->store('image', 'public');
        }
        $user->save();

        return view('home');
    }
}
//поменять isset, удалять старые авы
