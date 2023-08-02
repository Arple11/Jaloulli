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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('email',50)->unique();
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('user_name',30)->unique();
            $table->integer('phone_number');
            $table->integer('age');
            $table->string('gender');
            $table->string('education');
            $table->string('occupation');
            $table->text('interests')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('bio')->nullable();
            $table->integer('postal_code');
            $table->string('address');
            $table->string('password');
            $table->bigInteger('total_bought')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
