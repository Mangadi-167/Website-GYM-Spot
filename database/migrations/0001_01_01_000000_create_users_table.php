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
            $table->id('user_id');
            $table->string('name', 100); 
            $table->string('password', length: 100); 
            $table->enum('role', ['gym owner', 'admin','member'])->default('member'); 
            $table->string('email', 100)->unique(); 
            $table->string('no_hp', 50)->unique(); 
            $table->string('foto')->nullable(); 
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
