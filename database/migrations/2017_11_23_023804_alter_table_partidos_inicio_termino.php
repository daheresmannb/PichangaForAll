<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePartidosInicioTermino extends Migration {

    public function up() {
        Schema::table(
            'partidos', 
            function(Blueprint $table) {
                $table->dropColumn('inicio');
                $table->dropColumn('termino');
            }
        );

        Schema::table(
            'partidos', 
            function(Blueprint $table) {
                $table->timestamp('inicio')->nullable();
                $table->timestamp('termino')->nullable();
            }
        );
    }

    public function down() {
    }
}
