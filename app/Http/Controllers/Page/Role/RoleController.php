<?php

namespace App\Http\Controllers\Page\Role;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\RoleHasPermissions;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //     $this->middleware('permission:role-list', ['only' => ['index']]);
    //     $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:role-update', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
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
        $roles = Role::paginate(5);
        $categories = Category::get();

        $data = [
            $title = "Role",
            $paths = [
                "Home",
                "Role",
                "Index"
            ]
        ];

        return view('pages.role.role-index', compact("menus", "pages", "roles", "categories", "data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get();
        $pages = Page::get();
        $categories = Category::get();
        $permissions = Permission::get();

        $data = [
            $title = "Role",
            $paths = [
                "Home",
                "Role",
                "Add"
            ]
        ];

        return view('forms.role.add', compact("menus", "pages", "categories", "permissions", "data"));
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
            'name' => 'required|max:255',
            'guard_name' => 'required|max:255',
            'permissions' => 'required'
        ]);

        $input = $request->only('name', 'guard_name', 'permissions');

        $role = [
            'name' => $input['name'],
            'guard_name' => $input['guard_name'],
        ];

        Role::create($role)->syncPermissions($input['permissions']);

        return redirect()->route('home.role');
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
        $roles = Role::find($id);
        $pages = Page::get();
        $categories = Category::get();
        $permissions = Permission::get();
        $role_perm = RoleHasPermissions::where("role_has_permissions.role_id",$id);

        $data = [
            $title = "Role",
            $paths = [
                "Home",
                "Role",
                "edit"
            ],
            $uid = $id 
        ];

        return view('forms.role.edit', compact("menus", "roles", "pages", "categories", "permissions", "role_perm", "data"));
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
            'name' => 'required|max:255',
            'guard_name' => 'required|max:255'
        ]);

        $input = $request->only('name', 'guard_name', 'permissions');

        $Role = Role::findOrFail($id);
        $Role->name = $input['name'];
        $Role->guard_name = $input['guard_name'];
        $Role->save();
    
        if ($request->has('permissions')) {
            $Role->syncPermissions($input['permissions']);
        }
        
        return redirect()->route('home.role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Role::findOrFail($id)->delete();

        return redirect()->route('home.role');
    }
}