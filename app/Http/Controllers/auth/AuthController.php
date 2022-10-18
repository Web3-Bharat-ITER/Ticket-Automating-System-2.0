<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $user = User::where('email', $request['email'])
            ->where('password', $request['password'])
            ->get();

        if ($user->count() == 0) {
            return back()->with('error', 'Incorrect Username/Password');
        } else {
            session()->put('isLoggedIn', 1);
            session()->put('email', $user[0]['email']);
            session()->put('role', $user[0]['role']);
            session()->put('uid', $user[0]['uid']);
        }
        return redirect('/');
    }
    public f
}
