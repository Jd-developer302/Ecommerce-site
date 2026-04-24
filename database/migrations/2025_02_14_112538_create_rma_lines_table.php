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
        Schema::create('rma_lines', function (Blueprint $table) {
            $table->id();
            $table->string('rma_id');
            $table->integer('product_id')->nullable();
            $table->integer('combination_id')->nullable();
            $table->string('name');
            $table->string('quantity');
            $table->string('price');
            $table->string('sub_price');
            $table->string('vat')->default(0);
            $table->integer('bundle_id')->nullable();
            $table->string('delivery_charge')->default(0);
            $table->string('trans_id', 20)->nullable();
            $table->string('payment_status', 20)->nullable();
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
        Schema::dropIfExists('rma_lines');
    }
};
