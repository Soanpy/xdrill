<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('street', 255);
            $table->string('number', 255);
            $table->string('complement', 255)->nullable();
            $table->string('district', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('country', 255);
            $table->string('phone', 255);
            $table->string('status', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
