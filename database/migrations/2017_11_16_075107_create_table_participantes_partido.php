<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableParticipantesPartido extends Migration {

    public function up() {
      Schema::create(
        'participantes_partidos',
        function (Blueprint $table) {
          $table->uuid('id')->default(
            DB::raw('uuid_generate_v4()')
          );
          $table->uuid('partido_id');
          $table->uuid('jugador_id');
          $table->foreign('partido_id')
              ->references('id')
              ->on('partidos')
          ->onDelete('cascade');
          $table->foreign('jugador_id')
              ->references('id')
              ->on('users')
          ->onDelete('cascade');
          $table->timestamps();
        }
      );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
