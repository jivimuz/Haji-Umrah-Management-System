<?php

use App\Models\Module;
use App\Models\Role;
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
        Schema::create('m_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('menuAccess');
        });
        $a = Module::select('id')->orderBy('id', 'asc')->get();
        $b = [];
        foreach($a as $i){
            $b[] = $i->id;
        }
        $b = implode(',', $b);
        
        $data = [
            ["name" => "Superadmin", "menuAccess" => $b],
            ["name" => "Viewer", "menuAccess" => '1'],
        ];
        Role::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_roles');
    }
};
