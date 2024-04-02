<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker()->username,
            'first_name' => $this->faker()->first_name,
            'last_name' =>  $this->faker()->first_name,
            'phone_number' => $this->faker()->phoneNumber,
            'email' => $this->faker()->email,
            'address' => $this->faker()->address,
            'status' => 'verified',
            'role' => 'admin',
            'birthdate' => $this->faker()->defaultBirthdate,
            'password' => Hash::make('123123123'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
