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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_name');
            $table->string('pickup_pincode');
            $table->string('pickup_source_pincode');
            $table->string('pickup_mobile');
            $table->mediumText('pickup_address');
            $table->string('delivery_name');
            $table->string('delivery_pincode');
            $table->string('delivery_source_pincode');
            $table->string('delivery_mobile');
            $table->mediumText('delivery_address');
            $table->enum('orderCreated', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
