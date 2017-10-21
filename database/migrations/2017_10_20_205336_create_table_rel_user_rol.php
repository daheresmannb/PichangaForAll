<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRelUserRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable('rel_user_rol')) {
            Schema::create(
                'rel_user_rol',
                function (Blueprint $table) {
                    $table->uuid('id')->default(
                        DB::raw('uuid_generate_v4()')
                    );
                    $table->uuid('user_id')->unique();
                    $table->integer('rol_id')->unique();
                    $table->primary('id');
                    $table->foreign('user_id')
                        ->references('id')
                        ->on('users')
                    ->onDelete('cascade');

                    $table->foreign('rol_id')
                        ->references('id')
                        ->on('roles')
                    ->onDelete('cascade');

                    $table->timestamps();
                }
            );
        }
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
