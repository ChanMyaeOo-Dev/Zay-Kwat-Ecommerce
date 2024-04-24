<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'ZayKwat Admin',
            'phone' => '09779866151',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Chan Myae Oo',
            'phone' => '09123123123',
            'password' => Hash::make('password'),
            // 'role' => 'admin'
        ]);

        $this->call([CategorySeeder::class]);
        Brand::factory(10)->create();
        Product::factory(20)->create();
        $this->call([KeywordSeeder::class]);

        // $photos = Storage::allFiles("public");
        // array_shift($photos);
        // Storage::delete($photos);

        // echo "\e[93mStorage Cleaned \n";
    }
}
