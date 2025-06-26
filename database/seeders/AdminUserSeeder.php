<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@alfasoft.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('alfasoft'),
                'is_admin' => true,
            ]
        );
    }
}
