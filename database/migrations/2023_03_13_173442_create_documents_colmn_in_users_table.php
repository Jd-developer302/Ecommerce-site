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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('document', 'aadhar');
            $table->string('emirates_no',255)->nullable();
            $table->string('aadhar_no',255)->nullable();
            $table->string('account_no',255)->nullable();
            $table->string('passport',255)->nullable();
            $table->string('emirates_id',255)->nullable();
            $table->string('pancard',255)->nullable();
            $table->string('cv',255)->nullable();
            $table->string('appointment',255)->nullable();
            $table->string('mutal',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('aadhar', 'document');
            $table->dropColumn('emirates_no');
            $table->dropColumn('aadhar_no');
            $table->dropColumn('account_no');
            $table->dropColumn('passport');
            $table->dropColumn('emirates_id');
            $table->dropColumn('pancard');
            $table->dropColumn('cv');
            $table->dropColumn('appointment');
            $table->dropColumn('mutal');
        });
    }
};
