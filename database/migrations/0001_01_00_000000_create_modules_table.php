<?php

use App\Models\Module;
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
        Schema::create('m_modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('group_id');
            $table->string('group_name');
            $table->integer('list_no');
            $table->string('icon')->nullable();
            $table->string('route')->default('#')->nullable();
            $table->boolean('isheader');
            $table->boolean('isactive');
        });

        $data = [
            [
                'name' => 'Dashboard',
                'code' => 'DB',
                'group_id' => 1,
                'group_name' => 'db',
                'list_no' => 1,
                'icon' => 'fa fa-home',
                'route' => '/',
                'isheader' => true,
                'isactive' => true,
            ],
            [
                'name' => 'Master',
                'code' => 'MT',
                'group_id' => 2,
                'group_name' => 'M',
                'list_no' => 2,
                'icon' => 'fa fa-briefcase',
                'route' => '#',
                'isheader' => true,
                'isactive' => true,
            ],
            [
                'name' => 'Access',
                'code' => 'MTA',
                'group_id' => 2,
                'group_name' => 'M',
                'list_no' => 1,
                'icon' => '',
                'route' => '/access',
                'isheader' => false,
                'isactive' => false,
            ],
            [
                'name' => 'Users',
                'code' => 'MTU',
                'group_id' => 2,
                'group_name' => 'M',
                'list_no' => 1,
                'icon' => '',
                'route' => '/users',
                'isheader' => false,
                'isactive' => false,
            ],
            [
                'name' => 'Agen',
                'code' => 'AGN',
                'group_id' => 2,
                'group_name' => 'M',
                'list_no' => 1,
                'icon' => '',
                'route' => '/agen',
                'isheader' => false,
                'isactive' => true,
            ],
            [
                'name' => 'Paket',
                'code' => 'PKT',
                'group_id' => 2,
                'group_name' => 'M',
                'list_no' => 2,
                'icon' => '',
                'route' => '/paket',
                'isheader' => false,
                'isactive' => true,
            ],
            [
                'name' => 'Jamaah',
                'code' => 'JMA',
                'group_id' => 3,
                'group_name' => 'J',
                'list_no' => 3,
                'icon' => 'fa fa-address-book',
                'route' => '/jamaah',
                'isheader' => true,
                'isactive' => true,
            ],
            [
                'name' => 'Payment',
                'code' => 'PAY',
                'group_id' => 4,
                'group_name' => 'P',
                'list_no' => 4,
                'icon' => 'fa fa-money',
                'route' => '/payment',
                'isheader' => true,
                'isactive' => true,
            ],
            [
                'name' => 'Setting',
                'code' => 'SET',
                'group_id' => 5,
                'group_name' => 'P',
                'list_no' => 5,
                'icon' => 'fa fa-cogs',
                'route' => '/setting',
                'isheader' => true,
                'isactive' => true,
            ],

        ];

        Module::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_modules');
    }
};
