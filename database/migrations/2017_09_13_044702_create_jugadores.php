<?php

use Bosnadev\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadores extends Migration {

    public function up() {
        Schema::create(
            'jugadores', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('user_id');
                $table->string('apodo');
                $table->string('posicion');
                $table->integer('edad');
                $table->integer('estatura');
                $table->integer('peso');
                $table->boolean('disponible')->default(
                    false
                );
                $table->point('location');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                ->onDelete('cascade');
                $table->timestamps();
            }
        );
    }

    public function down() {
        Schema::drop('jugadores');
    }
}