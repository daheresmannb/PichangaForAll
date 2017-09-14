<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
    public function up() {
        DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        Schema::create(
            'users',
            function (Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->integer('rol')->default(1);       
                $table->rememberToken();
                $table->timestamps();
                $table->primary('id');
            }
        );
    }

    public function down() {
        Schema::drop('users');
    }
}