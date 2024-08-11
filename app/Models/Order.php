<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rec_name',
        'rec_address',
        'rec_phone',
        'payment_status',
    ];

    public function user(): HasOne{
        return $this->hasOne(User::class , 'id', 'user_id');
    }

    public function product(): HasOne{
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
