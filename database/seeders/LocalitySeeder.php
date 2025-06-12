<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Locality::factory()->count(5)->create();
    }
}
