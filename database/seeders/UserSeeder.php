<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Users = [
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
            'pinLogin' => '1234'
            ] ,

            [
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'manager',
            'pinLogin' => '2345'
        
            ],
            [
            'name' => 'waiter',
            'email' => 'waiter@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'waiter',
            'pinLogin' => '3456'
            ]
        ] ;

        foreach($Users as $user){
            $create_user =User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
                'pinLogin' =>$user['pinLogin']
              
            ]);
        }
        $create_user->assignRole($user['role']);
    }
}
