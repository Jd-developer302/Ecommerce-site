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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('image',255);
            $table->string('brand',255);
            $table->integer('stock');
            $table->string('sku')->comment('The actual alpha-numeric SKU code');
            $table->float('price',10,3);
            $table->string('status',255)->default('ACTIVE');
            $table->longText('description');
            $table->tinyInteger('is_newarrival');
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
        Schema::dropIfExists('academies');
    }
};
