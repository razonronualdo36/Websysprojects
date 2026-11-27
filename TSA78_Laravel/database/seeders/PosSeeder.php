<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'full_name' => 'Juan Dela Cruz',
            'email' => 'juan@example.com',
            'phone' => '09171234567',
        ]);

        Customer::create([
            'full_name' => 'Maria Santos',
            'email' => 'maria@example.com',
            'phone' => '09181234567',
        ]);

        Customer::create([
            'full_name' => 'Pedro Reyes',
            'email' => 'pedro@example.com',
            'phone' => '09191234567',
        ]);

        Customer::create([
            'full_name' => 'Angela Garcia',
            'email' => 'angela@example.com',
            'phone' => '09201234567',
        ]);

        Customer::create([
            'full_name' => 'Carlos Mendoza',
            'email' => 'carlos@example.com',
            'phone' => '09211234567',
        ]);

        User::create([
            'username' => 'admin',
            'full_name' => 'System Administrator',
        ]);

        User::create([
            'username' => 'jdelacruz',
            'full_name' => 'Juan Dela Cruz',
        ]);

        User::create([
            'username' => 'msantos',
            'full_name' => 'Maria Santos',
        ]);

        User::create([
            'username' => 'preyes',
            'full_name' => 'Pedro Reyes',
        ]);

        User::create([
            'username' => 'agarcia',
            'full_name' => 'Angela Garcia',
        ]);
    }
}