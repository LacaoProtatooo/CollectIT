<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Collectible;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collectible>
 */
class CollectibleFactory extends Factory
{
    protected $model = Collectible::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(9, 21),
            'name' => $this->faker->words(rand(1, 3), true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(100, 1500),
            'dimension' => $this->faker->word(),
            'condition' => $this->faker->word(),
            'stock' => $this->faker->numberBetween(1, 25),
            'manufacturer' => $this->faker->word(),
            'category' => $this->faker->word(),
            'image_path' => 'image.png', // Assuming image_path is a string, you may want to use `imageUrl()` or `image()` if you want fake image paths
            'status' => $this->faker->randomElement(['available']),
            'release_date' => $this->faker->dateTimeThisDecade(),

        ];
    }
}
