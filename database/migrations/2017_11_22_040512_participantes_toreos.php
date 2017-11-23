<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParticipantesToreos extends Migration
{
    public function up() {
      Schema::create(
        'participantes_toreos',
        function (Blueprint $table) {
          $table->uuid('id')->default(
            DB::raw('uuid_generate_v4()')
          );
          $table->uuid('torneo_id');
          $table->uuid('jugador_id');
          
          $table->foreign('torneo_id')
              ->references('id')
              ->on('torneos')
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
