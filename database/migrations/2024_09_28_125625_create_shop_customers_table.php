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
        Schema::create('shop_customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password', 500);
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->boolean('gender')->nullable();
            $table->string('email');
            $table->dateTime('birthday')->nullable();
            $table->string('avatar', 500)->nullable();
            $table->string('code')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('billing_address', 500)->nullable();
            $table->string('shipping_address', 500)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code', 15)->nullable();
            $table->string('country')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('activate_code')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_customers');
    }
};
