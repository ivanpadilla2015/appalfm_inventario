<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inventario_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('element_id')->unsigned();
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('serial',70);
            $table->string('num_activo',30);
            $table->date('fechadquirido');
            $table->double('cantidad',15,2);
            $table->text('estado');
            
            $table->timestamps();

            $table->foreign('element_id')->references('id')->on('elements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
