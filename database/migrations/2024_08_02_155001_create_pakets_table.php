<?php

use App\Models\Program;
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
        Schema::create('m_paket', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->length(100);
            $table->integer('program_id');
            $table->double('publish_price');
            $table->double('basic_price');
            $table->date('flight_date');
            $table->date('return_date');
            $table->enum('type', ['Haji', 'Umrah']);
            $table->enum('paket_type', ['Umrah', 'Haji Reguler', 'Haji Plus', 'Haji Furoda', 'Haji Khusus']);
            $table->string('attachment')->nullable();
            $table->timestamps();
        });

        Schema::create('m_program', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->length(100);
        });

        Program::insert([
            ['nama' => '9 Hari',],
            ['nama' => '14 Hari',],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_paket');
        Schema::dropIfExists('m_program');
    }
};
