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
        Schema::create('gym_address', function (Blueprint $table) {
            $table->id('id_address'); 
            $table->unsignedBigInteger('gym_id'); 
            $table->text('link'); 
            $table->string('address', 255); 
            $table->string('province', 255); 
            $table->string('regency', 255); 
            $table->string('subdistrict', 255); 
            $table->timestamps();

            // Foreign key menghubungkan gym_id dengan gyms.gym_id
            $table->foreign('gym_id')
                ->references('gym_id')
                ->on('gyms')
                ->onDelete('cascade'); 
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('gym_address');
    }
};
