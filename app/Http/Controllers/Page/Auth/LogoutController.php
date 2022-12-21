<?php

namespace App\Http\Controllers\Page\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
    */
    public function logout(Request $request)
    {  
        $user = auth()->user();
        activity("logout")->withProperties(["id" => $user->id, "username" => $user->username, "email" => $user->email, "phone" => $user->no_hp, "role" => $user->roles->pluck("name")[0]])->log($user->username." berhasil logout");

        Auth::logout();
         
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect()->route("signin");
    }
}
