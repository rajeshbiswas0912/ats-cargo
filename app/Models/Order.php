<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

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
        $prefix = 'ORD';
        $timestamp = now()->format('YmdHis');
        $random = Str::upper(Str::random(6));

        return $prefix . '-' . $timestamp . '-' . $random;
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
