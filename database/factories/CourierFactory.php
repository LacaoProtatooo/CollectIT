<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Courier;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courier>
 */
class CourierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     * @return array<string, mixed>
     */
    protected $model = Courier::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Lalamove', 'LBC Express', 'DHL Express', 'JRS Express', 'J&T Express', 'Ninja Van']),
            'rates' => $this->faker->randomElement([150, 75, 300, 180, 200, 250]),
            'type' => $this->faker->randomElement(['Express', 'Same Day Delivery', 'Normal']),
            'image_path' => 'image.png',
        ];
    }
}
