<?php

use App\Models\Employee;
use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_employee', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_user');
            $table->string('fullname');
            $table->string('nik');
            $table->string('bornloc')->nullable();
            $table->date('borndate')->nullable();
            $table->enum('gender', ["-", "LAKI-LAKI", "PEREMPUAN"])->default("-")->nullable();
            $table->string('personalemail')->nullable();
            $table->string('phonenumber')->nullable();
            $table->integer('fk_joblevel')->default(5)->nullable();
            $table->integer('fk_jobtype')->default(1);
            $table->date('joindate')->nullable();
            $table->date('outdate')->nullable();
            $table->integer('fk_designation')->default(1)->nullable();
            $table->integer('fk_study')->nullable();
            $table->integer('fk_marialstatus')->nullable();
            $table->integer('fk_religion')->nullable();
            $table->integer('fk_ptkp')->nullable();
            $table->integer('fk_bank')->nullable();
            $table->string('accountnumber')->nullable();
            $table->string('npwp')->nullable();
            $table->string('gajipokok')->default(0);
            $table->string('alamat')->nullable();
            $table->timestamps();
        });

        $a = Module::select('id')->orderBy('id', 'asc')->get();
        $b = [];
        foreach ($a as $i) {
            $b[] = $i->id;
        }
        $b = implode(',', $b);

        $data = [
            [
                'username' => "superadmin",
                'email' => "test@test.com",
                'email_verified_at' => now(),
                'password' =>  Hash::make('12341234'),
                'remember_token' => Str::random(10),
                'is_active' => true,
                'access' => $b
            ],
            [
                'username' => "user1",
                'email' => "user1@test.com",
                'email_verified_at' => now(),
                'password' =>  Hash::make('12341234'),
                'remember_token' => Str::random(10),
                'is_active' => true,
                'access' => 1
            ],
            [
                'username' => "user2",
                'email' => "user2@test.com",
                'email_verified_at' => now(),
                'password' =>  Hash::make('12341234'),
                'remember_token' => Str::random(10),
                'is_active' => true,
                'access' => 1
            ],


        ];
        User::insert($data);

        $data = [
            [
                'fk_user' => 1,
                'nik' => 123213131,
                'fullname' => "Superadmin",
                'fk_designation' => 1
            ],
            [
                'fk_user' => 2,
                'nik' => 123255131,
                'fullname' => "User1",
                'fk_designation' => 2
            ],
            [
                'fk_user' => 3,
                'nik' => 122113131,
                'fullname' => "User2",
                'fk_designation' => 3
            ],
        ];
        Employee::insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_employee');
    }
};
