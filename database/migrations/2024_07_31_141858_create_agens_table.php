<?php

use App\Models\Agen;
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
        Schema::create('m_agen', function (Blueprint $table) {
            $table->id();
            $table->string('kode_agen')->length(5);
            $table->string('nama')->length(50);
            $table->string('no_ktp')->length(16);
            $table->string('no_hp')->length(13)->nullable();
            $table->string('alamat')->length(200)->nullable();
            $table->string('nama_bank')->length(20)->nullable();
            $table->string('no_rek')->length(16)->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        Agen::insert([
            [
                "kode_agen" => 'TST',
                "nama" => 'test',
                "alamat" => 'Alamat test',
                "no_ktp" => '4123214',
                "no_hp" => '08123213',
                "nama_bank" => 'BRI',
                "no_rek" => '123123131',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_agen');
    }
};
