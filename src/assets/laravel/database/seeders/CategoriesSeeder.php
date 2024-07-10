<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Graphic Design','created_at' => now(),'updated_at' => now()],
            ['name' => 'Web Development','created_at' => now(),'updated_at' => now()],
            ['name' => 'SEO Optimization','created_at' => now(),'updated_at' => now()],
            ['name' => 'Video Marketing','created_at' => now(),'updated_at' => now()],
            ['name' => 'Premium Sponsoring Services','created_at' => now(),'updated_at' => now()],
            ['name' => 'Web Hosting','created_at' => now(),'updated_at' => now()]
            // Add more categories as needed
        ];

        DB::table('categories')->insert($categories);
    }
}
