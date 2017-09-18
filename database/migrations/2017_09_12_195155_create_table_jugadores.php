<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJugadores extends Migration {
    public function up() {
        Schema::create(
            'jugadores', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('user_id');
                $table->string('apodo');
                $table->integer('edad');
                $table->float('estatura');
                $table->float('peso');
                $table->enum(
                    'posicion', 
                    array(
                        'Guardameta',
                        'Defensor', 
                        'Medio campo',
                        'Delantero',
                    )
                );
                $table->boolean('disponible')->default(
                        false
                );
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                ->onDelete('cascade');
                $table->timestamps();
                $table->primary('id');
            }
        );
    }
    public function down() {
    }
}