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
        Schema::create('foto_gym', function (Blueprint $table) {
            $table->id('id_foto'); 
            $table->unsignedBigInteger('gym_id'); 
            $table->string('foto_gym1', 255); 
            $table->string('foto_gym2', 255)->nullable(); 
            $table->string('foto_gym3', 255)->nullable(); 
            $table->timestamps();

            // Relasi ke tabel gyms
            $table->foreign('gym_id')
                ->references('gym_id')
                ->on('gyms')
                ->onDelete('cascade'); // Hapus foto jika gym terkait dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_gym');
    }
};
