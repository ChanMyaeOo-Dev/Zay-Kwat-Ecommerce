<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Health and beauty", "Electronic devices", "Man fashion", "Woman fashion", "Shoes", "Watches"];
        $images = [
            "beauty_icon.png",
            "electronic_icon.png",
            "man_fashion_icon.png",
            "woman_fashion_icon.png",
            "shoe_icon.png",
            "watch_icon.png"
        ];
        foreach ($categories as $key => $category) {
            Category::factory()->create([
                "title" => $category,
                "cover_image" => $images[$key]
            ]);
        }
    }
}
