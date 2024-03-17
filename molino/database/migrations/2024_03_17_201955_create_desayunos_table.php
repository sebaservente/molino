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
        Schema::create('desayunos', function (Blueprint $table) {
            $table->id('desayuno_id');
            $table->string('titulo', 255);
            $table->unsignedInteger('precio');
            $table->text('descripcion');
            $table->string('categoria');
            $table->string('imagen', 255)->nullable();
            $table->string('imagen_descripcion', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desayunos');
    }
};
