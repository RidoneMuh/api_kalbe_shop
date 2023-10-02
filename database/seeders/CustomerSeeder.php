<?php

namespace Database\Seeders;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // dd(new Carbon('2016-01-23'));
        Customer::create([
            'txtCustomerName' => 'Andi',
            'txtCustomerAddress' => 'Jl. Swantara Utara IV No. 9A, Bekasi Barat',
            'bitGender' => '1',
            'dtmBirthDate' => new Carbon('1995/10/15'),
        ]);

        Customer::create([
            'txtCustomerName' => 'Indah',
            'txtCustomerAddress' => 'Jl. Dirganta Blok B8, Cengkareng',
            'bitGender' => '0',
            'dtmBirthDate' => new Carbon('1998/09/29'),
        ]);
    }
}
