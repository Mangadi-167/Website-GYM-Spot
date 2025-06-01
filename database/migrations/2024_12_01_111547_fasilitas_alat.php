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
        Schema::create('tool_facilities', function (Blueprint $table) {
            $table->id('id_tool_facilities'); 
            $table->unsignedBigInteger('gym_id'); 
            $table->string('tool_facility', 255); 
            $table->timestamps();

            // Relasi ke tabel gyms
            $table->foreign('gym_id')
                ->references('gym_id')
                ->on('gyms')
                ->onDelete('cascade'); // Hapus data fasilitas alat jika gym terkait dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tool_facilities');
    }
};
