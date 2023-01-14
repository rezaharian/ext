<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->default('admin@gmail.com');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('admin123'));
            // tambahan untuk role id ditable role
            $table->unsignedBigInteger('role_id')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });


     
        DB::table('users')->insert(
            ['name' => 'admin'], 
        );

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
