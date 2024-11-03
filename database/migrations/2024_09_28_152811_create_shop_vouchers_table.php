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
        Schema::create('shop_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_code', 500);
            $table->string('voucher_name', 500);
            $table->text('description');
            $table->integer('uses')->unsigned();
            $table->integer('max_uses')->unsigned();
            $table->integer('max_uses_user')->unsigned();
            $table->boolean('type', 3);
            $table->double('discount_amount');
            $table->boolean('is_fixed');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamp('delete_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_vouchers');
    }
};