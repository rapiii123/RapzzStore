<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'server',
        'quantity',
        'total_price',
        'phone_number',
        'payment_method',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
