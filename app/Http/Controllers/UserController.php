<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $req) {
        // return $req;
        $user = User::where(['email'=>$req->email])->first();
        // return $user->password;
        if(!$user || !Hash::check($req->password, $user->password)) {
            return "User name or password is not matched";
        }else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }
}
