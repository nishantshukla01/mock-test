<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatewayResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateway_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('payment_id')->nullable();
            $table->string('CURRENCY')->nullable();
            $table->string('GATEWAYNAME')->nullable();
            $table->string('RESPMSG')->nullable();
            $table->string('BANKNAME')->nullable();
            $table->string('PAYMENTMODE')->nullable();
            $table->string('MID')->nullable();
            $table->string('RESPCODE')->nullable();
            $table->float('TXNAMOUNT', '10', '2')->nullable();
            $table->string('ORDERID')->nullable();
            $table->string('STATUS')->nullable();
            $table->string('BANKTXNID')->nullable();
            $table->dateTime('TXNDATE')->nullable();
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
        Schema::dropIfExists('gateway_responses');
    }
}
