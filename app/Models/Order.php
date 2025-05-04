<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->tracking_no = self::generateTrackingId();
        });
    }

    protected static function generateTrackingId()
    {
        $lastOrderId = self::max('tracking_no');

        // Ensure minimum starting point
        $nextOrderId = $lastOrderId ? $lastOrderId + 1 : 1000001;

        $digits = 8 - strlen($nextOrderId);
        if ($digits <= 0) {
            throw new \Exception("Order ID is too long to generate tracking ID");
        }

        return $nextOrderId;
    }

    public function packages()
    {
        return $this->hasMany(OrderPackage::class, 'order_id', 'id');
    }

    /**
     * Get all of the tracking for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tracking(): HasMany
    {
        return $this->hasMany(OrderTracking::class, 'order_id', 'id');
    }
}