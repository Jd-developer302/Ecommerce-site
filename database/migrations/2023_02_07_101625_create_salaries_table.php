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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('monthly_package',255);
            $table->string('per_day_salary',255);
            $table->string('attendence',255);
            $table->string('monthly_salary',255);
            $table->string('nightshift',255);
            $table->string('amount',255);
            $table->string('esi',255);
            $table->string('deducted_amount',255);
            $table->string('total_amount',255);
            $table->dateTime('salary_given');
            $table->string('month',255);
            $table->year('year');
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
        Schema::dropIfExists('salaries');
    }
};
