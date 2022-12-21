<?php

namespace App\Http\Controllers\Page\Account;

use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:akun-list', ['only' => ['index']]);
    //     $this->middleware('permission:akun-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:akun-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:akun-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();
        $pages = Page::get();
        $users = User::paginate(10);
        $categories = Category::get();

        $data = [
            $title = "Akun",
            $paths = [
                "Home",
                "Akun",
                "Index"
            ]
        ];

        return view('pages.account.account-index', compact("menus", "pages", "users", "categories", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get();
        $roles = Role::all();
        $pages = Page::get();
        $categories = Category::get();

        $data = [
            $title = "Akun",
            $paths = [
                "Home",
                "Akun",
                "Add"
            ]
        ];

        return view('forms.account.add', compact("menus", "roles", "pages", "categories", "data"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'role' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|same:confirm_password'
        ]);

        $input = $request->only("username", "role", "phone_number", "email", "password");
        $input['password'] = bcrypt($input['password']);

        User::create($input)->assignRole($input['role'])->save();

        return redirect()->route('home.akun');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();
        $user = User::findOrFail($id);

        $data = [
            $title = "Akun",
            $paths = [
                "Home",
                "Akun",
                "Edit"
            ],
            $uid = $id 
        ];

        return view('forms.account.edit', compact("roles", "menus", "pages", "user", "categories", "data"));
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
            'role' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email:dns',
        ]);

        $input = $request->only("username", "phone_number", "email");
        
        $account = User::findOrFail($id);
        $account->update($input);
        $account->syncRoles($request->input('role'));
        $account->save();

        return redirect()->route('home.akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('home.akun');
    }
}