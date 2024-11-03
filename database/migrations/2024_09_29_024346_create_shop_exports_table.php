<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop_exports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('store_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->dateTime('export_date');
            $table->text('description')->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('shop_stores');
            $table->foreign('employee_id')->references('id')->on('acl_users');
            $table->foreign('order_id')->references('id')->on('shop_orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_exports');
    }
};