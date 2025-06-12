<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'delivery_address',
        'total_amount',
        'receipt', // 👈 Add this
        'tracking_code',
        'status',
    ];

    public static function generateTrackingCode(): string
    {
        return 'AMN-' . strtoupper(Str::random(6));
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
