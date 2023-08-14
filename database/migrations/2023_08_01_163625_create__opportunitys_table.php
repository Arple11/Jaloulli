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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned()->nullable(FALSE);
            $table->bigInteger('product_id')->unsigned()->nullable(FALSE);
            $table->bigInteger('price')->nullable(FALSE);
            $table->bigInteger('quantity')->nullable(FAlSE);
            $table->longText('opportunity_explanation')->nullable();
            $table->enum('opportunity_status', ['follow_up', 'ongoing', 'finished']);
            $table->enum('is_urgent' , ['on' , 'off'])->default('off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_opportunitys');
    }
};