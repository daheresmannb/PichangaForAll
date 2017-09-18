<?php

use Illuminate\Database\Migrations\Migration;
use Phaza\LaravelPostgis\Schema\Blueprint;

class CreateTableUbicacionJugador extends Migration {
    public function up() {
        Schema::create(
            'ubicacion_jugador',
            function (Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('jugador_id')->unique();
                $table->point('location');
                $table->foreign('jugador_id')
                    ->references('id')
                    ->on('jugadores')
                ->onDelete('cascade');
                $table->timestamps();
            }
        );
    }

    public function down() {
    }
}
