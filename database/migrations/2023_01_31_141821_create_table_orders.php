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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',255);
            $table->string('name',255);
            $table->string('phone',255);
            $table->string('email',255);
            $table->string('city',255);
            $table->text('address');
            $table->integer('total_qty');
            $table->float('delivery_charge',10,2);
            $table->float('total_price',10,2);
            $table->string('status',255)->default('ORDER PLACED');
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
        Schema::dropIfExists('orders');
    }
};
