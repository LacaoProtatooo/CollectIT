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
            'user_id' => 2,
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomDigit(),
            'dimension' => $this->faker->word(),
            'condition' => $this->faker->word(),
            'stock' => $this->faker->randomDigit(),
            'manufacturer' => $this->faker->word(),
            'category' => $this->faker->word(),
            'image_path' => 'image.png', // Assuming image_path is a string, you may want to use `imageUrl()` or `image()` if you want fake image paths
            'status' => $this->faker->randomElement(['available', 'sold']),
            'release_date' => $this->faker->dateTimeThisDecade(),
            
        ];
    }
}
