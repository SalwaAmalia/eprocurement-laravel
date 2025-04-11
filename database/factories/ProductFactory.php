<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 2, // atau gunakan User::factory()->create()->id jika dinamis
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
