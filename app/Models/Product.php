<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'intProductID';

    protected $fillable = [
        'txtProductCode', 'txtProductName', 'intQty', 'decPrice'
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class, 'intSalesOrderID');
    }
}
