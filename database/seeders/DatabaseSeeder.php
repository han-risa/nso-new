<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Asst. Manager']);
        Role::create(['name'=>'Staff']);

        User::create([
            'nama' => 'Admin',
            'nip' => '123456789012345678',
            'jabatan' => 'BIG BOSS',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ])->assignRole('Admin');

        User::create([
            'nama' => 'staff',
            'nip' => '123456789012345678',
            'jabatan' => 'crook',
            'username' => 'staff',
            'password' => bcrypt('staff'),
        ])->assignRole('Staff');

        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Staff');
        });
    }
}
