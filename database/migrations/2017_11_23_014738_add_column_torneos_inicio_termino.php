<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTorneosInicioTermino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table(
               'torneos',
           function (Blueprint $table) {
                $table->timestamp('inicio')->nullable();
                $table->timestamp('termino')->nullable(); 
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
