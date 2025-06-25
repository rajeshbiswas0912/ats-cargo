<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('shipping_charge')->default(0);
            $table->decimal('pickup_charge')->default(0);
            $table->decimal('hamali')->default(0);
            $table->decimal('sc_cost')->default(0);
            $table->decimal('st_charge')->default(0);
            $table->decimal('delivery_charge')->default(0);
            $table->decimal('igst')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shipping_charge');
            $table->dropColumn('pickup_charge');
            $table->dropColumn('hamali');
            $table->dropColumn('sc_cost');
            $table->dropColumn('st_charge');
            $table->dropColumn('delivery_charge');
            $table->dropColumn('igst');
        });
    }
};
