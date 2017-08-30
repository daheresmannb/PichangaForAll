<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration {
    public function up() {
        Schema::create(
            'password_resets',
            function (Blueprint $table) {
                $table->integer('id');
                $table->uuid('user_id');
                $table->string('email')->index();
                $table->string('token')->index();
                $table->timestamp('created_at');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                ->onDelete('cascade');
            }
        );
    }

   public function down() {
        Schema::drop('password_resets');
    }
}