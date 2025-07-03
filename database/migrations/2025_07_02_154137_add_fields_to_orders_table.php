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
            $table->string("pickup_city")->nullable()->after("pickup_address");
            $table->string("pickup_gst")->nullable()->after("pickup_city");
            $table->string("pickup_pan")->nullable()->after("pickup_gst");
            $table->string("pickup_other_doc")->nullable()->after("pickup_pan");

            $table->string("delivery_city")->nullable()->after("delivery_address");
            $table->string("delivery_gst")->nullable()->after("delivery_city");
            $table->string("delivery_eway_bill")->nullable()->after("delivery_gst");

            $table->string("invoice_number")->nullable()->after("payment_type");
            $table->date("invoice_date")->nullable()->after("invoice_number");

            $table->decimal("price_per_kg", 8, 2)->default(0)->after("deleted_at");
            $table->integer('igst')->change();
            $table->decimal("sub_total", 8, 2)->default(0)->after("igst");

            $table->string("mode_of_transport")->nullable();
            $table->string("mode_of_delivery")->nullable();
            $table->string("gst_paid_by")->nullable();
            $table->string("vehicle_number")->nullable();
            $table->string("challan_number")->nullable();
            $table->string("owner_risk")->nullable();
            $table->mediumText("remarks")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn("pickup_city");
            $table->dropColumn("pickup_gst");
            $table->dropColumn("pickup_pan");
            $table->dropColumn("pickup_other_doc");

            $table->dropColumn("delivery_city");
            $table->dropColumn("delivery_gst");
            $table->dropColumn("delivery_eway_bill");

            $table->dropColumn("invoice_number");
            $table->dropColumn("invoice_date");

            $table->dropColumn("price_per_kg");
            $table->decimal('igst', 8, 2)->change();
            $table->dropColumn("sub_total");

            $table->dropColumn("mode_of_transport");
            $table->dropColumn("mode_of_delivery");
            $table->dropColumn("gst_paid_by");
            $table->dropColumn("vehicle_number");
            $table->dropColumn("challan_number");
            $table->dropColumn("owner_risk");
            $table->dropColumn("remarks");
        });
    }
};
