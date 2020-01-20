<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGridsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grids', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->integer('nazwa_siatki');
            $table->unsignedBigInteger('year_id');
            $table->foreign('year_id')->references('id')->on('study_years');
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->boolean('stacjonarne');
            $table->boolean('inzynierskie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grids');
    }
}
