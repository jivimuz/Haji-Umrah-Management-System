<?php

use App\Models\Ptkp;
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
        Schema::create('m_ptkp', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('nominal');
        });
        $data = [
            ["name" => "TK", "nominal" => 54000000],
            ["name" => "K0", "nominal" => 58000000],
            ["name" => "K1", "nominal" => 63000000],
            ["name" => "K2", "nominal" => 67500000],
            ["name" => "K3", "nominal" => 72000000],
        ];
        Ptkp::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_ptkp');
    }
};
