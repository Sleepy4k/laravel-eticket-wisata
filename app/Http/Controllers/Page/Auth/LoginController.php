<?php

namespace App\Http\Controllers\Page\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
    */
    public function index()
    {
        $data = [
            $title = "Sign In"
        ];

        return view("pages.auth.login-index", compact("data"));
    }

    /**
     * Write code on Method
     *
     * @return response()
    */
    public function login(Request $request)
    {
        $request->validate([
            "username" => "required|min:4|max:255",
            "password" => "required|min:8|max:255",
        ]);

        $input = $request->only("username", "password");

        if (Auth::attempt($input)) {
            $request->session()->regenerate();

            $user = auth()->user();
            activity("login")->withProperties(["id" => $user->id, "username" => $user->username, "email" => $user->email, "phone" => $user->no_hp, "role" => $user->roles->pluck("name")[0]])->log($user->username." berhasil login");

            return redirect()->intended("/");
        } else {
            return back()->withErrors([
                "message" => "Username and password doesn't match"
            ]);
        }
    }
}
