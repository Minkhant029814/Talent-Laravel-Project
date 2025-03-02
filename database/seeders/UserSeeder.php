<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::create([
            'name'=>'Bob',
            'email'=>'Bog@mail.com',
            'phone'=>'097777777',
            'address'=>'Yangon',
            'password'=>Hash::make('password'),
            'gender'=>'male',
        ]);

        $guest = User::create([
            'name'=>'Alice',
            'email'=>'Alice@mail.com',
            'phone'=>'152455',
            'password'=> Hash::make('password'),
            'gender'=>'male',
        ]);

        $admin->assignRole('admin');
        $guest->assignRole('guest');
    }
}
