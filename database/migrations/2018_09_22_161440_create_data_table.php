<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->float('depth')->nullable();
            $table->float('rop')->nullable();
            $table->float('rpm')->nullable();
            $table->float('wob')->nullable();
            $table->float('tflo')->nullable();
            $table->float('stor')->nullable();
            $table->float('mse')->nullable();
            $table->float('mi')->nullable();
            $table->integer('well_id')->unsigned();
            $table->index('well_id');
            $table->string('status',20)->default('ACTIVE');
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
        Schema::dropIfExists('data');
    }
}
