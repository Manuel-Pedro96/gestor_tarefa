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
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('equipe_usuario', function (Blueprint $table) {
        $table->id();
        $table->foreignId('equipe_id')->constrained('equipes')->onDelete('cascade');
        $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
        $table->string('papel')->default('membro');
        $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipes');
    }
};
