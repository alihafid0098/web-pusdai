<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('chat_logs', function (Blueprint $table) {
        $table->id();
        $table->string('session_id')->index(); // Untuk melacak pengunjung yang sama
        $table->text('user_message');
        $table->text('ai_response');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('chat_logs');
    }
};
