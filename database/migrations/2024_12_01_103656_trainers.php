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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id('trainer_id'); 
            $table->unsignedBigInteger('gym_id'); 
            $table->string('trainer_name', 100); 
            $table->string('no_hptrainer', 50); 
            $table->string('foto_trainer', 255); 
            $table->string('gender_trainer', 50); 
            $table->timestamps();

            // Foreign key yang menghubungkan gym_id dengan gyms.gym_id
            $table->foreign('gym_id')->references('gym_id')->on('gyms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
