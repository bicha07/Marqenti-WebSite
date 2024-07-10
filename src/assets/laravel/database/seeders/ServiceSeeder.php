<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServiceSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            ['name' => 'Logo Design', 'price' => 299, 'category' => 'Graphic Design'],
            ['name' => 'Letterhead Design', 'price' => 79, 'category' => 'Graphic Design'],
            ['name' => 'Envelope Design', 'price' => 49, 'category' => 'Graphic Design'],
            ['name' => 'Brand Guidelines', 'price' => 1600, 'category' => 'Graphic Design'],
            ['name' => 'Business Card Design', 'price' => 109, 'category' => 'Graphic Design'],
            ['name' => 'Packaging Design', 'price' => 120, 'category' => 'Graphic Design'],
            ['name' => 'Roll-Up', 'price' => 249, 'category' => 'Graphic Design'],
            ['name' => 'Menu Design / Menu QR', 'price' => 60, 'category' => 'Graphic Design'],
            ['name' => 'Partial Vehicle Covering', 'price' => 200, 'category' => 'Graphic Design'],
            ['name' => 'Full Vehicle Covering', 'price' => 350, 'category' => 'Graphic Design'],
            ['name' => 'Partial Truck Covering', 'price' => 550, 'category' => 'Graphic Design'],
            ['name' => 'Full Truck Covering', 'price' => 850, 'category' => 'Graphic Design'],
            // Web Services
            ['name' => 'SEO', 'price' => 399, 'category' => 'Web Development'],
            ['name' => 'Static Website','price' => 799, 'category' => 'Web Development'],
            ['name' => 'Dynamic Website', 'price' => 1199, 'category' => 'Web Development'],
            ['name' => 'E-Commerce Website', 'price' => 1499, 'category' => 'Web Development'],
            // Video Production
            ['name' => 'Video Editing & Post-Production', 'price' => 399, 'category' => 'Video Marketing'],
            ['name' => '2D/3D Animation', 'price' => 799, 'category' => 'Video Marketing'],
            ['name' => 'Social & Marketing Video', 'price' => 599, 'category' => 'Video Marketing'],
            ['name' => 'Product/Service Video', 'price' => 1499, 'category' => 'Video Marketing'],
            // Social Media Sponsoring
            ['name' => 'Content Creation', 'price' => 299, 'category' => 'Premium Sponsoring Services'],
            ['name' => 'Publication Design', 'price' => 299, 'category' => 'Premium Sponsoring Services'],
            ['name' => 'Publication Promotion', 'price' => 69, 'category' => 'Premium Sponsoring Services'],
            ['name' => 'Reporting & Analytics', 'price' => 399, 'category' => 'Premium Sponsoring Services'],
            // Brand Sponsoring
            ['name' => 'Page Sponsorship', 'price' => 299, 'category' => 'Premium Sponsoring Services'],
            ['name' => 'Page Management', 'price' => 249, 'category' => 'Premium Sponsoring Services'],
            ]);
    }
}