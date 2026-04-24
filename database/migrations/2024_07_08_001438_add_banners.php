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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('banner1', 255)->nullable();
            $table->string('banner2', 255)->nullable();
            $table->string('banner3', 255)->nullable();
            $table->string('banner4', 255)->nullable();
            $table->string('banner5', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('banner1');
            $table->dropColumn('banner2');
            $table->dropColumn('banner3');
            $table->dropColumn('banner4');
            $table->dropColumn('banner5');
        });
    }
};
