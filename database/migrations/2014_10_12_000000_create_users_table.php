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
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('user')->unique();
            $table->string('skill')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            $table->tinyInteger('approved')->default(0);
            $table->string('occupation')->nullable();
            $table->integer('exp')->nullable();
            $table->string('link')->nullable();
            $table->string('portfolio')->nullable();
            $table->integer('price')->nullable();
            $table->string('available')->nullable();
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
