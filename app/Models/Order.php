<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_contact',
        'customer_address',
        'payment_method',
        'total_price',
        'products_ordered',
        'status' => 'Completed',
    ];

    protected $casts = [
        'products_ordered' => 'array', // Automatically cast it to an array
    ];


}
