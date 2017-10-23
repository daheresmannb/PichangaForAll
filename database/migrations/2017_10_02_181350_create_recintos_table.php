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
                $table->uuid('id_encargado')->unique();
                $table->string('nombre');
                $table->timestamps();
                $table->foreign('id_encargado')
                    ->references('id')
                    ->on('users')
                ->onDelete('cascade'); 
                $table->primary('id');
            }
        );
    }

    public function down() {
       
    }
}
