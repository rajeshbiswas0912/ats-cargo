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
        $lastOrderId = self::max('id') + 1;

        $digits = 7 - strlen($lastOrderId);
        if ($digits <= 0) {
            throw new \Exception("Order ID is too long to generate tracking ID");
        }

        $randomPart = str_pad(mt_rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
        return $lastOrderId . $randomPart;
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
