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
        'customer_address',                // ⬅️ make sure this is here
        'delivery_address',
        'total_amount',
        'receipt',
        'locality_id',
        'delivery_fee',
        'receipt_uploaded_at',
        'tracking_code',
        'status',
    ];
    protected $casts = [
        'receipt_uploaded_at' => 'datetime',
    ];
    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }
    public static function generateTrackingCode(): string
    {
        return 'AMN-' . strtoupper(Str::random(6));
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
