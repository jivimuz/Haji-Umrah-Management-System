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
        Schema::create('t_jamaah', function (Blueprint $table) {
            $table->id();
            $table->integer('agen_id');
            $table->string('nama');
            $table->string('born_place');
            $table->date('born_date');
            $table->string('alamat')->nullable();
            $table->string('no_hp');
            $table->string('no_ktp');
            $table->string('no_passport');
            $table->integer('paket_id');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->boolean('is_firstpaid')->default(0);
            $table->boolean('is_done')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_jamaah');
    }
};
