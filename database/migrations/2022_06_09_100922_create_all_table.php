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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->float('price');
            $table->string('location');
            $table->datetime('expired_date');
            $table->timestamps();
        });

        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->datetime('history_date');
            $table->string('history');
            $table->timestamps();
        });

        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('bidding', function (Blueprint $table) {
            $table->id();
            $table->datetime('bidding_date');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->float('bid_price');
            $table->integer('win_status');
            $table->integer('pay_status');
            $table->string('pay_file');
            $table->integer('approver_id');
            $table->timestamps();
        });

        Schema::create('product_vendor', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('vendor_id');
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
        Schema::dropIfExists('all');
    }
};
