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
        Schema::create('t_payment', function (Blueprint $table) {
            $table->id();
            $table->integer('agen_id')->default(0);
            $table->integer('jamaah_id')->default(0);
            $table->string('jamaah_name');
            $table->double('nominal');
            $table->string('remark');
            $table->datetime('paid_at')->nullable();
            $table->datetime('void_at')->nullable();
            $table->integer('void_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_payment');
    }
};
