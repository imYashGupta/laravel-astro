<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string("user_id");
            $table->string("invoice_id");
            $table->string("paypal_token");
            $table->string("billing_email");
            $table->json("billing_details");
            $table->string("coupon_id")->nullable();
            $table->string("status")->nullable();
            $table->string("shipping_type")->nullable();
            $table->text("address");
            $table->json("address_json");
            $table->text("notes")->nullable();
            $table->float('subtotal',9,2);
            $table->float('coupon_discount',9,2)->default(0);
            $table->float('shipping_charge',9,2)->default(0);
            $table->float('amount_paid',9,2);
            $table->json("paypal_response")->nullable();
            $table->string("payment_status");
            $table->softDeletes();
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
}
