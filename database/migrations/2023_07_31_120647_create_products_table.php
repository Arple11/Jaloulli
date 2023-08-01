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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',50)->nullable(FALSE);
            $table->longText('explanation');
            $table->bigInteger('price')->unsigned();
            $table->integer('amount_available')->unsigned()->default(0);
            $table->json('images_urls'); #json cues a products may have multiple images (so multiple urls)
            $table->integer('amount_sold')->unsigned()->default(0);
            $table->string('tags',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
