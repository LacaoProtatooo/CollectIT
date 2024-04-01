<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $defaultEmail = 'admin@gmail.com';
        $defaultBirthdate = $faker->date($format = 'Y-m-d', $max = 'now');

        $user = User::create([
            'username' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'User_admin',
            'phone_number' => $faker->phoneNumber,
            'email' => $defaultEmail,
            'address' => 'TUP-TAGUIG',
            'status' => 'verified',
            'role' => 'admin',
            'birthdate' => $defaultBirthdate,
            'password' => Hash::make('123123123'),
        ]);
    }
}
