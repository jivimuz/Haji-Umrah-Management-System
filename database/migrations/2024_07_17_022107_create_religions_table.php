<?php

use App\Models\Religion;
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
        Schema::create('m_religion', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        $data = [
            ["name" => "Islam"],
            ["name" => "Katholik"],
            ["name" => "Kristen"],
            ["name" => "Hindu"],
            ["name" => "Budha"],
            ["name" => "Atheis"],
            ["name" => "Lainnya"],
        ];
        Religion::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_religion');
    }
};
