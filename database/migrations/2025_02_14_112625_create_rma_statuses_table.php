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
        Schema::create('rma_statuses', function (Blueprint $table) {
            $table->id();  // Creates an auto-incrementing id as primary key (bigint UNSIGNED)
            $table->string('rma_id');  // Order ID (varchar)
            $table->string('status');  // Status (varchar)
            $table->string('changed_by');  // Name of the person who changed the status
            $table->integer('user_id');  // User ID (integer)
            $table->timestamps();  // Created_at and updated_at timestamps
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rma_statuses');
    }
};
