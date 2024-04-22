<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'delivery_address',
        'payment_method',
        'total_amount',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
