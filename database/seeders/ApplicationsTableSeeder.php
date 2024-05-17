<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Application;
use App\Models\User;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            Application::create([
                'user_id' => $user->id,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'dob' => $faker->date,
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'country' => $faker->country,
                'state' => $faker->state,
                'city' => $faker->city,
                'address' => $faker->address,
                'zip_code' => $faker->postcode,
                'default_currency' => $faker->currencyCode,
                'status' => $faker->randomElement(['pending', 'approved', 'rejected']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
