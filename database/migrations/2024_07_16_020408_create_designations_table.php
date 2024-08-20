<?php

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_joblevel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('level');
        });
        $data = [
            ["name" => "Director", "level" => 1],
            ["name" => "Manager", "level" => 2],
            ["name" => "Head of Division", "level" => 3],
            ["name" => "Supervisor", "level" => 4],
            ["name" => "Staff", "level" => 5],
            ["name" => "Intern", "level" => 6],
        ];
        DB::table('m_joblevel')->insert($data);

        Schema::create('m_jobtype', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        $data = [
            ["name" => "Contract"],
            ["name" => "Permanent"],
            ["name" => "Freelance"],
        ];
        DB::table('m_jobtype')->insert($data);

        Schema::create('m_department', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
        });
        $data = [
            ["name" => "Human Resource", 'code' => "HR"],
            ["name" => "Chief Executife Officer", 'code' => "CEO"],
            ["name" => "Information Technology", 'code' => "IT"],
            ["name" => "Marketing", 'code' => "MKT"],
        ];
        Department::insert($data);

        Schema::create('m_designation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('fk_department');
        });
        $data = [
            ["name" => "Unplaced", 'fk_department' => 0],
            ["name" => "Director", 'fk_department' => 1],
            ["name" => "Human Resource Development", 'fk_department' => 1],
            ["name" => "Chief Executife Officer", 'fk_department' => 2],
            ["name" => "Full Stack Developer", 'fk_department' => 3],
            ["name" => "Marketing", 'fk_department' => 4],
            ["name" => "Finance", 'fk_department' => 4],
        ];
        Designation::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_joblevel');
        Schema::dropIfExists('m_jobtype');
        Schema::dropIfExists('m_designation');
        Schema::dropIfExists('m_department');
    }
};
