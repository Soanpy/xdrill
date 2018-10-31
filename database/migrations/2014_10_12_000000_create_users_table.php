<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            //DADOS BASE
            $table->string('name', 150);
            $table->string('username', 150)->unique();
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 150);
            $table->string('phone', 20);
            $table->string('cellphone', 20);
            $table->string('status', 20);//ACTIVE, INACTIVE
            $table->string('type', 20);//ADMIN, USER

            //ENDEREÇO
            $table->string('street', 255)->nullable();
            $table->string('number', 255)->nullable();
            $table->string('complement', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('zip', 255)->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name'=>'Admin',
                'username' => 'administrador',
                'email' => 'admin@admin.com',
                'password'=>bcrypt('xDrill123!'),
                'phone' => '+5527997484254',
                'cellphone' => '+5527997484254',
                'type' => 'ADMIN',
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'=>'Yuri',
                'username' => 'soapin',
                'email' => 'yuri@gmail.com',
                'password'=>bcrypt('123456'),
                'phone' => '+5527997484254',
                'cellphone' => '+5527997484254',
                'type' => 'USER',
                'status' => 'ACTIVE',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
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
}
