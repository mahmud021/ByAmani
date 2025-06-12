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
        'receipt',
        'receipt_uploaded_at',
        'tracking_code',
        'status',
    ];
    protected $casts = [
        'receipt_uploaded_at' => 'datetime',
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
