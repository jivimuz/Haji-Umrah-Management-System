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
            $table->string('born_place')->nullable();
            $table->date('born_date')->nullable();
            $table->string('alamat')->nullable();

            $table->string('no_hp')->nullable();
            $table->string('no_ktp');
            $table->string('no_passport')->nullable();
            $table->date('passport_date')->nullable();
            $table->date('passport_expired')->nullable();
            $table->integer('paket_id');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('city_passport')->nullable();
            $table->string('no_porsi')->nullable();
            $table->date('regis_date')->nullable();
            $table->date('est_date')->nullable();
            $table->string('vaccine1')->nullable();
            $table->date('vaccine1_date')->nullable();
            $table->string('vaccine2')->nullable();
            $table->date('vaccine2_date')->nullable();
            $table->string('vaccine3')->nullable();
            $table->date('vaccine3_date')->nullable();
            $table->double('discount')->default(0);
            $table->enum('gender', ['L', 'P'])->nullable();
            $table->boolean('is_firstpaid')->default(0);
            $table->boolean('is_done')->default(0);
            $table->string('attachment')->nullable();
            $table->date('firstpaid_date')->nullable();
            $table->date('donepaid_date')->nullable();
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
