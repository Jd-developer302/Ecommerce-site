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
        Schema::table('attribute_combinations', function (Blueprint $table) {
            $table->dropForeign('attribute_combinations_attribute_id_foreign');
            $table->dropForeign('attribute_combinations_attributevalue_id_foreign');
            $table->dropColumn('attribute_id');
            $table->dropColumn('attributevalue_id');
            $table->string('attribute_ids_combinations',255);
            $table->string('attribute_comb_name',255);
            $table->string('image',255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attribute_combinations', function (Blueprint $table) {
            $table->foreignId('attribute_id')->constrained()->cascadeOnDelete();
            $table->foreignId('attributevalue_id')->constrained()->cascadeOnDelete();
            $table->dropColumn('attribute_ids_combinations');
            $table->dropColumn('attribute_comb_name');
            $table->dropColumn('image');
        });
    }
};
