<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTorneos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create(
            'torneos', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('id_recinto')->unique();
                $table->uuid('id_encargado')->unique();
                $table->string('fono_contacto');
                $table->timestamps();
                $table->foreign('id_encargado')
                    ->references('id')
                    ->on('users')
                ->onDelete('cascade'); 
                $table->foreign('id_recinto')
                    ->references('id')
                    ->on('recintos')
                ->onDelete('cascade'); 
                $table->primary('id');
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
