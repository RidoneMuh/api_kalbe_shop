<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $primaryKey = 'intSalesOrderID';

    protected $fillable = [
        'intCustomerID', 'intProductID', 'dtSalesOrder', 'intQty'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'intProductID');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'intCustomerID');
    }
}
