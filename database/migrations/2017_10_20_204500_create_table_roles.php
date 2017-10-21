<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoles extends Migration {
    public function up() {
        if (!Schema::hasTable('roles')) {
            Schema::create(
                'roles',
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('nombre');
                    $table->timestamps();
                    $table->primary('id');
                }
            );
        }
    }

    public function down() {
    }
}
