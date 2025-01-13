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
        Schema::create('message_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('visualizado')->default(false);
            $table->timestamps();

            $table->foreign(('message_id'))->references('id')->on('messages');
            $table->foreign(('user_id'))->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('message_user', function (Blueprint $table) {
            $table->dropColumn('visualizado');
            $table->dropForeign(['message_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
