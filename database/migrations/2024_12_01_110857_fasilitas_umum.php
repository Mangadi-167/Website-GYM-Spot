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
        Schema::create('public_facilities', function (Blueprint $table) {
            $table->id('id_public_facilities'); 
            $table->unsignedBigInteger('gym_id'); 
            $table->string('public_facility', 255); 
            $table->timestamps();

            // Relasi ke tabel gyms
            $table->foreign('gym_id')
                ->references('gym_id')
                ->on('gyms')
                ->onDelete('cascade'); // Hapus fasilitas umum jika gym terkait dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_facilities');
    }
};
