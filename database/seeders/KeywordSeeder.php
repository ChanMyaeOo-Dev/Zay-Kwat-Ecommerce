<?php

namespace Database\Seeders;

use App\Models\Keyword;
use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
    public function run()
    {
        $keywords = ["mouse", "phone", "tv", "cloth", "book", "shoe"];
        foreach ($keywords as $key => $keyword) {
            Keyword::factory()->create([
                "value" => $keyword,
                "product_id" => rand(1, 20)
            ]);
        }
    }
}
