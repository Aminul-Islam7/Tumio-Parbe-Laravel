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
            $table->string('student_id')->unique();
            $table->string('name');
            $table->integer('age');
            $table->string('class')->nullable();
            $table->string('school')->nullable();
            $table->string('phone');
            $table->string('district');
            $table->string('facebook');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('email')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
