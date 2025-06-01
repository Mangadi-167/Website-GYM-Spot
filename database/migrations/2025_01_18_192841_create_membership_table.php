<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('membership', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('gym_id'); 
            $table->string('name');
            $table->string('email');
            $table->string('no_hp');
            $table->string('pembayaran'); 
            $table->enum('status', ['pending', 'approved', 'verified', 'rejected'])->default('pending'); // Status membership
            $table->timestamps();

            // Relasi ke tabel users
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            // Relasi ke tabel gyms
            $table->foreign('gym_id')->references('gym_id')->on('gyms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('membership');
    }
};
