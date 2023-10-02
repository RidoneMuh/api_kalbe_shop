<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prenagen = Product::create([
            'txtProductCode' => 'P0001',
            'txtProductName' => 'Prenagen Mommy',
            'intQty'         => '1',
            'decPrice'       => '12000'
        ]);

        $hydroCoco = Product::create([
            'txtProductCode' => 'P0002',
            'txtProductName' => 'Hydro Coco',
            'intQty'         => '4',
            'decPrice'       => '15000'
        ]);
    }
}
