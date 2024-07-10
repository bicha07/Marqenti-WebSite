<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicePackSeeder extends Seeder
{
    public function run()
    {
        $servicePacks = [
            ['pack_id' => 1, 'service_id' => 2,'created_at' => now(),'updated_at' => now()],
            ['pack_id' => 1, 'service_id' => 3,'created_at' => now(),'updated_at' => now()],
            ['pack_id' => 1, 'service_id' => 4,'created_at' => now(),'updated_at' => now()],
            ['pack_id' => 1, 'service_id' => 5,'created_at' => now(),'updated_at' => now()],
        ];

        DB::table('pack_service')->insert($servicePacks);
    }
}
