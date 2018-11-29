<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWellAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('well_analyses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('well_id')->unsigned();
            $table->index('well_id');
            $table->integer('analysis_id')->unsigned();
            $table->index('analysis_id');
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
        Schema::dropIfExists('well_analyses');
    }
}
