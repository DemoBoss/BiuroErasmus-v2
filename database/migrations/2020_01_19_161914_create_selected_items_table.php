<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_items', function (Blueprint $table) {
            $table->Bigincrements('id');
            $table->string('Przedmioty');
            $table->string('Forma_zaliczenia');
            $table->string('Wykład');
            $table->string('Cw_Konw_Lab');
            $table->string('ECTS')->nullable();
            $table->string('Na_rok')->nullable();
            $table->string('Opis')->nullable();

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
        Schema::dropIfExists('selected_items');
    }
}
