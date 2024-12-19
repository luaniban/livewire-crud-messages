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
        Schema::table('messages', function (Blueprint $table) {
            // Adicionando novas colunas
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->string('dataAt');
            $table->string('status');
            $table->string('titulo');
            // Adicione quantas colunas precisar
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            // Para reverter a adição das colunas, remova-as
            $table->dropColumn('name');
            $table->dropColumn('file');
            $table->dropColumn('dataAt');
            $table->dropColumn('status');
            $table->dropColumn('titulo');
        });
    }
};
