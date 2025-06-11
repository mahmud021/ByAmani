<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            '3-4 yrs', '5-6 yrs', '7-8 yrs', '9-10 yrs',
            'S', 'M', 'L', 'XL'
        ];

        foreach ($sizes as $label) {
            Size::firstOrCreate(['label' => $label]);
        }
    }
}
