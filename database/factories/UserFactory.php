<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'avatar' => 'https://source.unsplash.com/random/256x256?headshot&' . fake()->numberBetween(),
            'email' => fake()->unique()->safeEmail(),
            'remember_token' => Str::random(10)
        ];
    }
}
