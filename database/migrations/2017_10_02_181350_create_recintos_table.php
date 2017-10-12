<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecintosTable extends Migration{
    
    public function up() {
        Schema::create(
            'recintos', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('id_encargado');
                $table->string('nombre');
                $table->timestamps();
                
                $table->primary('id');
                $table->foreign('id_encargado')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade'); 
            }
        );
    }

    public function down() {
       
    }
}
