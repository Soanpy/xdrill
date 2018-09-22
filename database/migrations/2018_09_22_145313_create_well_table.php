<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('well', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('title', 255);
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->index('user_id');
            $table->integer('company_id')->unsigned();
            $table->index('company_id');
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
        Schema::dropIfExists('well');
    }
}
