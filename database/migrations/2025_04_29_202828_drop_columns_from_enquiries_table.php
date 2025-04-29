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
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropColumn('pickup_source_pincode');
            $table->dropColumn('delivery_source_pincode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->string('pickup_source_pincode')->after('pickup_pincode');
            $table->string('delivery_source_pincode')->after('delivery_pincode');
        });
    }
};