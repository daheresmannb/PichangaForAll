<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionRecintosTable extends Migration{
    public function up() {
        Schema::create(
            'ubicacion_recintos',
            function (Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('recintos_id')->unique();;
                $table->point('location');
                $table->timestamps();
                
                $table->primary('id');
                $table->foreign('recintos_id')
                    ->references('id')
                    ->on('recintos')
                    ->onDelete('cascade');

            }
        );
    }

    public function down() {
    }
}
