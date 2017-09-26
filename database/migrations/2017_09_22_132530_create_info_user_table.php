<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoUserTable extends Migration
{
    public function up() {
        Schema::create(
            'info_user', 
            function(Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('id_user');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('email')->unique();
                $table->string('telefono');
                $table->timestamps();
                $table->primary('id');
                $table->foreign('id_user')->references('id')->on('users'); 
            }
        );
    }

    public function down() {
       
    }
}
