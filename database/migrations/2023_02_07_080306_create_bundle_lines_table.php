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
        Schema::create('bundle_lines', function (Blueprint $table) {
            $table->id();
            $table->integer('bundle_id');
            $table->integer('product_id');
            $table->integer('combination_id')->nullable();
            $table->string('name',255);
            $table->string('quantity',255);
            $table->string('image',255)->nullable();
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
        Schema::dropIfExists('bundle_lines');
    }
};
