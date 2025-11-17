<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@innovationplace.bd',
            'password' => Hash::make('password'), // Change this!
            'is_admin' => true,
        ]);
    }
}
