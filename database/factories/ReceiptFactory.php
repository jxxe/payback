<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store' => fake()->company(),
            'amount' => fake()->numberBetween(1_00, 50_00),
            'description' => fake()->sentence(),
            'category_id' => Category::inRandomOrder()->first(),
            'archived' => fake()->boolean(10)
        ];
    }
}
