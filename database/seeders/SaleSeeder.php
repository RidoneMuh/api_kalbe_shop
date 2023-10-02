<?php

namespace Database\Seeders;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'intCustomerID' => '1',
            'intProductID'  => '1',
            'dtSalesOrder'  => Carbon::now(),
            'intQty'        => '1'
        ]);

        Sale::create([
            'intCustomerID' => '2',
            'intProductID'  => '1',
            'dtSalesOrder'  => Carbon::now(),
            'intQty'        => '1'
        ]);

        Sale::create([
            'intCustomerID' => '2',
            'intProductID'  => '2',
            'dtSalesOrder'  => Carbon::now(),
            'intQty'        => '3'
        ]);
    }
}
