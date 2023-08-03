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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email',50)->unique();
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('user_name',30)->unique();
            $table->string('phone_number',11);
            $table->integer('role')->default(1);
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
