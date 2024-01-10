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
        Schema::create('bukutamu', function (Blueprint $table) {
            $table->id('id_tamu');
            $table->string('nama');
            $table->string('notelp');
            $table->foreignId('id_departement');
            $table->text('tujuan');
            $table->timestamp('jadwal');
            $table->binary('foto') ;
            $table->tinyInteger('sendTo')->defaultValue(0);
            $table->tinyInteger('status')->defaultValue(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukutamu');
    }
};
