<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePartidos extends Migration {
    public function up() {
        Schema::create(
            'partidos', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->string('nombre');
                $table->uuid('recinto_id');
                $table->date('inicio');
                $table->date('termino');            
                $table->timestamps();
                $table->primary('id');
                $table->foreign('recinto_id')
                    ->references('id')
                    ->on('recintos')
                ->onDelete('cascade');
            }
        );
    }

    public function down() {
        Schema::drop('partidos');
    }
}
