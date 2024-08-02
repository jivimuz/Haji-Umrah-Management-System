<?php

use App\Models\Study;
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
        Schema::create('m_study', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('grade')->nullable();
        });

        $data = [
            ["name" => "SD" , "grade" => 0],
            ["name" => "SMP", "grade" => 0],
            ["name" => "SMA", "grade" => 1],
            ["name" => "D1", "grade" => 2],
            ["name" => "D2", "grade" => 2],
            ["name" => "D3", "grade" => 2],
            ["name" => "D4", "grade" => 3],
            ["name" => "S1", "grade" => 3],
            ["name" => "S2", "grade" => 4],
            ["name" => "S3", "grade" => 5],
        ];

        Study::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_study');
    }
};
