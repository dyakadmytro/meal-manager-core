<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'nutrition_facts' => json_encode([
                'cal' => $this->faker->randomDigit(),
                'carb' => $this->faker->randomDigit(),
                'prot' => $this->faker->randomDigit(),
                'fat' => $this->faker->randomDigit(),
            ]),
        ];
    }
}
