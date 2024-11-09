<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Menambahkan roles
    \App\Models\Role::create(['name' => 'admin']);
    \App\Models\Role::create(['name' => 'guest']);
    
    // Menambahkan pengguna dan menetapkan peran
    $admin = \App\Models\User::create([
        'name' => 'Admin User',
        'email' => 'admin@mail.com',
        'password' => bcrypt('password'),
    ]);
    $guest = \App\Models\User::create([
        'name' => 'Guest User',
        'email' => 'guest@mail.com',
        'password' => bcrypt('password'),
    ]);
    
    // Menetapkan peran
    $adminRole = \App\Models\Role::where('name', 'admin')->first();
    $guestRole = \App\Models\Role::where('name', 'guest')->first();
    
    $admin->roles()->attach($adminRole);
    $guest->roles()->attach($guestRole);
}
}
