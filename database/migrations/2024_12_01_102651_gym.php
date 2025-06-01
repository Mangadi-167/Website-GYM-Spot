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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id('gym_id'); 
            $table->unsignedBigInteger('user_id');
            $table->string('gym_name', 100);
            $table->decimal('price', 15, 2); 
            $table->decimal('price_member', 15, 2);
            $table->string('rekening', 100);
            $table->text('description');
            $table->string('no_hpowner', 50);
            $table->string('slug')->unique();
            $table->timestamps();
        
            // Definisi foreign key
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
