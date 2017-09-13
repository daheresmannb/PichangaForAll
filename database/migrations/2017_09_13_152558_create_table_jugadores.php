<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJugadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
            $table->uuid('id_info_equipos');
            $table->integer('numero');
            $table->float('estatura');
            $table->float('peso');
            $table->enum('posicion', array(
                'Guardameta',
                'Defensor', 
                'Medio campo',
                'Delantero',
                ));
            $table->integer('puntuacion');
            $table->point('localizacion');//point
            $table->timestamp('update_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jugadores');
    }
}
