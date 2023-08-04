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
            $table->string('phone_number',10);
            $table->tinyInteger('role')->default(1)->unsigned();
            $table->smallInteger('age')->unsigned();
            $table->string('gender',10);
            $table->string('education',15);
            $table->string('occupation');
            $table->text('interests')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('bio')->nullable();
            $table->bigInteger('postal_code');
            $table->string('address');
            $table->string('password');
            $table->boolean('enable')->default(1);
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
