<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::query()->delete();
        
        $categories = ['легкий', 'хрупкий', 'тяжелый'];

        foreach ($categories as $category) {
            ProductCategory::create(['name' => $category]);
        }
    }
}
