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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50)->unique();
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('user_name', 30)->unique();
            $table->string('phone_number', 20);
            $table->tinyInteger('role_id')->default(1)->unsigned();
            $table->smallInteger('age')->unsigned();
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->enum('education', ['high_school', 'bachelor', 'master', 'doctorate'])->default('high_school');
            $table->string('occupation');
            $table->text('interests')->nullable();
            $table->text('hobbies')->nullable();
            $table->text('bio')->nullable();
            $table->bigInteger('postal_code');
            $table->string('address');
            $table->string('password');
            $table->softDeletes();
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
