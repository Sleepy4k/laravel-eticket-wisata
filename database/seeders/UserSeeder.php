<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'email' => 'admin@puskomedia.id',
            'phone_number' => '628112617445'
        ]);
     
        $data->assignRole('superadmin');

        $data2 = User::create([
            'username' => 'user',
            'password' => bcrypt('12345678'),
            'email' => 'user@puskomedia.id',
            'phone_number' => '628145654745754'
        ]);
     
        $data2->assignRole('admin');

        $data3 = User::create([
            'username' => 'loket',
            'password' => bcrypt('12345678'),
            'email' => 'loket@puskomedia.id',
            'phone_number' => '628144309030754'
        ]);
     
        $data3->assignRole('loket');
    }
}
