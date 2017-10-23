<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFaltas extends Migration {
    public function up() {
        if (!Schema::hasTable('faltas')) {
            Schema::create(
                'faltas',
                function (Blueprint $table) {
                    $table->uuid('id')->default(
                        DB::raw('uuid_generate_v4()')
                    );
                    $table->uuid('jugador_id');
                    $table->timestamps();
                    $table->foreign('jugador_id')
                        ->references('id')
                        ->on('jugadores')
                    ->onDelete('cascade'); 
                    $table->primary('id');
                }
            );
        }
    }

    public function down() {
    }
}