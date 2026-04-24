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
        Schema::table('rmas', function (Blueprint $table) {
            $table->decimal('total_price', 8, 2)->nullable();
            $table->integer('combination_id')->nullable();
            $table->string('name', 255);
            $table->string('quantity', 255);
            $table->string('price', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->string('city', 255);
            $table->text('address');
            $table->integer('total_qty');
            $table->float('delivery_charge', 10, 2);
            $table->string('total_vat', 255)->default(0);
            $table->date('delivery_date')->nullable();
            $table->integer('delivery_boy_id')->nullable();
            $table->string('created_by', 255)->nullable();
            $table->integer('coupon_id')->nullable();
            $table->string('coupon_price')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('areacode')->nullable();
            $table->string('lat', 100)->nullable();
            $table->string('long', 100)->nullable();
            $table->date('shipped_date')->nullable();
            $table->tinyInteger('rto')->default(0);
            $table->date('rto_date')->nullable();
            $table->date('pto_date')->nullable();
            $table->string('awb')->nullable();
            $table->date('shipped_date1')->nullable();
            $table->date('shipped_date2')->nullable();
            $table->date('shipped_date3')->nullable();
            $table->date('shipped_date4')->nullable();
            $table->integer('delivery_boy_id1')->nullable();
            $table->integer('delivery_boy_id2')->nullable();
            $table->integer('delivery_boy_id3')->nullable();
            $table->integer('delivery_boy_id4')->nullable();
            $table->text('awb_details')->nullable();
            $table->softDeletes();
            $table->string('source')->nullable();
            $table->string('whatsapp', 255)->nullable();
            $table->string('payment_method', 20)->default('cod');
            $table->string('trans_id', 255)->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->decimal('shipping_charge_collected', 8, 2)->nullable();
            $table->decimal('gross_sale_amount', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rmas', function (Blueprint $table) {
            //
        });
    }
};
