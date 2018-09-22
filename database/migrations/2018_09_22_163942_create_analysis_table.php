<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis', function (Blueprint $table) {
            $table->increments('id');
            $table->float('depth');
            $table->float('rop')->nullable();
            $table->float('rpm')->nullable();
            $table->float('wob')->nullable();
            $table->float('tflo')->nullable();
            $table->float('stor')->nullable();
            $table->float('mse')->nullable();
            $table->float('mi')->nullable();
            $table->integer('data_id')->unsigned();
            $table->index('data_id');
            $table->string('status',20);
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
        Schema::dropIfExists('analysis');
    }
}
