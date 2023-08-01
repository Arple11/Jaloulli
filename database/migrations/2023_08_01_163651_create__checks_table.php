<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->unsigned()->nullable(FALSE);
            $table->bigInteger('customer_id')->unsigned()->nullable(FALSE);
            $table->bigInteger('total_amount')->unsigned();
            $table->bigInteger('order_id')->unsigned()->nullable(FALSE); #for witch order was it from
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_checks');
    }
};
