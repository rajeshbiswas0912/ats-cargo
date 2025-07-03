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
        Schema::table('order_packages', function (Blueprint $table) {
            $table->string("method_of_packaging")->nullable();
            $table->integer("volume_weight")->default(0);
            $table->integer("charges_weight")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_packages', function (Blueprint $table) {
            $table->dropColumn("method_of_packaging");
            $table->dropColumn("volume_weight");
            $table->dropColumn("charges_weight");
        });
    }
};
