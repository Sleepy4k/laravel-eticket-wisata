<?php

namespace App\Http\Controllers\Page\Profile;

use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        $user = auth()->user();
        $pages = Page::get();
        $categories = Category::get();

        $data = [
            $title = "Profile",
            $paths = [
                "Home",
                "Profile",
                "Index"
            ]
        ];

        return view('pages.profile.profile-index', compact("menus", "user", "pages", "categories", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::get();
        $pages = Page::get();
        $user = User::findOrFail($id);
        $categories = Category::get();

        $data = [
            $title = "Profile",
            $paths = [
                "Home",
                "Profile",
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.profile.edit', compact("menus", "pages", "user", "categories", "data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:255',
            'phone_number' => 'required',
            'email' => 'required|email:dns'
        ]);

        $input = $request->only("username", "phone_number", "email");

        User::findOrFail($id)->update($input);
        
        return redirect()->route('home.profile');
    }
}