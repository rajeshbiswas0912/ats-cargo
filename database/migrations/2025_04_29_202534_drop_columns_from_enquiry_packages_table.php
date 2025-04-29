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
        Schema::table('enquiry_packages', function (Blueprint $table) {
            $table->dropColumn('amount');
            $table->dropColumn('payment_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiry_packages', function (Blueprint $table) {
            $table->double('amount', 8, 2)->after('width');
            $table->string('payment_type')->after('amount');
        });
    }
};