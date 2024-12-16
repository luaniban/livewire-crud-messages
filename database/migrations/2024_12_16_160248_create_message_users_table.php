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
        Schema::create('message_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('remetente_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('destinatario_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('message_id')->references('id')->on('messages')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_users');
    }
};
