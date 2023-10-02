<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'intProductID';

    protected $fillable = [
        'txtProductCode', 'txtProductName', 'intQty', 'decPrice'
    ];
}
