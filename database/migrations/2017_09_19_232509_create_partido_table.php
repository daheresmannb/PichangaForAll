<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidoTable extends Migration
{

    public function up() {
        Schema::create(
            'partido', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('recinto_id');              
                $table->timestamps();
                $table->primary('id');
                //$table->foreign('recinto_id')->references('id')->on('recintos'); 
            }
        );
    }

    public function down() {
        Schema::drop('partido');
    }
}