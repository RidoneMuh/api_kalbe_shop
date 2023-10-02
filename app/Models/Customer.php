<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'intCustomerID';

    protected $fillable = [
        'txtCustomerName', 'txtCustomerAddress', 'bitGender', 'dtmBirthDate'
    ];
}
