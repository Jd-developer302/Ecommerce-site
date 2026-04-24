<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_reports', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->index();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('city')->nullable();
            $table->string('delivery_note')->nullable();
            $table->string('product_code')->index();
            $table->string('sku_code')->index();
            $table->string('product_name')->nullable();
            $table->decimal('delivery_charge', 8, 2)->default(0.00);
            $table->decimal('product_price', 8, 2)->default(0.00);
            $table->integer('quantity')->default(0);
            $table->decimal('product_sub_price', 8, 2)->default(0.00);
            $table->decimal('product_vat', 8, 2)->default(0.00);
            $table->decimal('product_total_price', 8, 2)->default(0.00);
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->decimal('daily_spend', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_reports');
    }
};
