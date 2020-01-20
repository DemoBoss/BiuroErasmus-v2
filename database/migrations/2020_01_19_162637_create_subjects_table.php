<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->unsignedBigInteger('grid_id');
            $table->foreign('grid_id')->references('id')->on('grids');
            $table->string('Przedmioty')->nullable();
            $table->string('Forma_zaliczenia')->nullable();
            $table->string('Wykład1')->nullable();
            $table->string('Cw_Konw_Lab_1')->nullable();
            $table->string('ECTS_s1')->nullable();
            $table->string('semestr_1')->nullable();
            $table->string('Wykład2')->nullable();
            $table->string('Cw_Konw_Lab_2')->nullable();
            $table->string('ECTS_s2')->nullable();
            $table->string('semestr_2')->nullable();
            $table->string('rok1')->nullable();

            $table->string('Wykład3')->nullable();
            $table->string('Cw_Konw_Lab_3')->nullable();
            $table->string('ECTS_s3')->nullable();
            $table->string('semestr_3')->nullable();
            $table->string('Wykład4')->nullable();
            $table->string('Cw_Konw_Lab_4')->nullable();
            $table->string('ECTS_s4')->nullable();
            $table->string('semestr_4')->nullable();
            $table->string('rok2')->nullable();

            $table->string('Wykład5')->nullable();
            $table->string('Cw_Konw_Lab_5')->nullable();
            $table->string('ECTS_s5')->nullable();
            $table->string('semestr_5')->nullable();
            $table->string('Wykład6')->nullable();
            $table->string('Cw_Konw_Lab_6')->nullable();
            $table->string('ECTS_s6')->nullable();
            $table->string('semestr_6')->nullable();
            $table->string('rok3')->nullable();

            $table->string('Wykład7')->nullable();
            $table->string('Cw_Konw_Lab_7')->nullable();
            $table->string('ECTS_s7')->nullable();
            $table->string('semestr_7')->nullable();
            $table->string('rok4')->nullable();
            $table->string('Nazwa_pliku')->nullable();
            $table->string('Nazwa_plikuu')->nullable();

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
        Schema::dropIfExists('subjects');
    }
}
