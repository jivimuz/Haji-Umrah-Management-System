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
        Schema::create('t_morepayment', function (Blueprint $table) {
            $table->id();
            $table->integer('jamaah_id');
            $table->string('jamaah_name');
            $table->double('nominal');
            $table->string('remark');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_morepayment');
    }
};
