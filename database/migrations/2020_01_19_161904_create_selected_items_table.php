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
            $table->string('Wykład')->nullable();
            $table->string('Cw_Konw_Lab')->nullable();
            $table->string('ECTS')->nullable();
            $table->string('Na_rok');
            $table->string('Siatka_z_roku');
            $table->string('Opis');

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
