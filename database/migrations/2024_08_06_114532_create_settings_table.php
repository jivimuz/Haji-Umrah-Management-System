<?php

use App\Models\Setting;
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
        Schema::create('m_setting', function (Blueprint $table) {
            $table->id();
            $table->string('parameter');
            $table->string('value')->nullable();
            $table->enum('type', ['text', 'number', 'file'])->default('text');
        });

        Setting::insert([
            [
                "parameter" => 'app_name',
                "value" => 'PayNotes',
                "type" => 'text',
            ],
            [
                "parameter" => 'company_name',
                "value" => 'Pay Notes',
                "type" => 'text',
            ],
            [
                "parameter" => 'company_city',
                "value" => 'Cirebon',
                "type" => 'text',
            ],
            [
                "parameter" => 'company_address',
                "value" => 'Cirebon - Jawa Barat',
                "type" => 'text',
            ],
            [
                "parameter" => 'company_logo',
                "value" => null,
                "type" => 'file',
            ],
            [
                "parameter" => 'no_surat',
                "value" => 0,
                "type" => 'number',
            ],
            [
                "parameter" => 'price_1_sar_in_idr',
                "value" => 4000,
                "type" => 'number',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_setting');
    }
};
