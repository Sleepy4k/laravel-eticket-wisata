<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'admin menu',
            'system menu',
            'dashboard page',
            'penjualan page',
            'wisata page',
            'menu page',
            'halaman page',
            'akun page',
            'role page',
            'category page',
            'audit page'
        ];
    
        foreach ($permissions as $data) {
            Permission::create(['name' => $data]);
        };

        $role1 = Role::create(['name' => 'superadmin']);
        $perm1 = Permission::pluck('id','id')->all();
        $role1->syncPermissions($perm1);

        $role2 = Role::create(['name' => 'admin']);
        $perm2 = [
            'admin menu',
            'dashboard page',
            'penjualan page',
            'wisata page'
        ];
        $role2->syncPermissions($perm2);

        $role3 = Role::create(['name' => 'loket']);
        $perm3 = [
            'admin menu',
            'penjualan page'
        ];
        $role3->syncPermissions($perm3);
    }
}
