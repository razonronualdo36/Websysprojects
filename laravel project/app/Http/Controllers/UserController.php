<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'username' => 'admin',
                'name' => 'System Administrator',
                'role' => 'Administrator',
            ],
            [
                'id' => 2,
                'username' => 'jdelacruz',
                'name' => 'Juan Dela Cruz',
                'role' => 'Cashier',
            ],
            [
                'id' => 3,
                'username' => 'msantos',
                'name' => 'Maria Santos',
                'role' => 'Cashier',
            ],
            [
                'id' => 4,
                'username' => 'preyes',
                'name' => 'Pedro Reyes',
                'role' => 'Manager',
            ],
            [
                'id' => 5,
                'username' => 'agarcia',
                'name' => 'Angela Garcia',
                'role' => 'Staff',
            ],
        ];

        return view('users', compact('users'));
    }
}