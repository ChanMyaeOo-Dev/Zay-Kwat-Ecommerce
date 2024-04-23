<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            "title" => fake()->name(),
            "description" => fake()->text(),
            "price" => fake()->numberBetween(100, 900) . "00",
            "category_id" => Category::inRandomOrder()->first()->id,
            "brand_id" => fake()->numberBetween(1, 6),
            "feature_image" => "default_image.svg",
            "stock_qty" => fake()->numberBetween(1, 10),
        ];
    }
}
