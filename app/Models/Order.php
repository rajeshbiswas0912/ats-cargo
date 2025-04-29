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
        $nextNumber = DB::transaction(function () {
            $sequence = DB::table('tracking_sequences')->lockForUpdate()->first();
            $next = $sequence->last_number + 1;

            if ($next > 9999999) {
                throw new \Exception("Tracking number limit reached");
            }

            DB::table('tracking_sequences')->update(['last_number' => $next]);
            return $next;
        });

        return str_pad($nextNumber, 7, '0', STR_PAD_LEFT);
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