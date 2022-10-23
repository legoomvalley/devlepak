<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('1234567890')
        ])->assignRole('admin');

        User::create([
            'name' => 'supervisor',
            'email' => 'supervisor@email.com',
            'password' => Hash::make('1234567890')
        ])->assignRole('supervisor');
    }
}
