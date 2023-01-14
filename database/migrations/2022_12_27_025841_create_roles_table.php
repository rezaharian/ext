<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            // nama role
            $table->string('role_name')->unique();
            $table->timestamps();
        });

        Role::create([
            'role_name' => 'superadmin',
        ]);

        Role::create([
            'role_name' => 'pegawai',
        ]);
        Role::create([
            'role_name' => 'bos',
        ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
