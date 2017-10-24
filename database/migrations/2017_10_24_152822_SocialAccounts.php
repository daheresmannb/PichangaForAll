<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SocialAccounts extends Migration {
    public function up() {
        Schema::create(
            'social_logins', 
            function (Blueprint $table) {
                $table->uuid('id')->default(
                    DB::raw('uuid_generate_v4()')
                );
                $table->uuid('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                ->onDelete('cascade');
                $table->string('provider', 32);
                $table->text('social_id');
                $table->timestamps();
                //$table->softDeletes();
            }
        );
        Schema::table(
            'users', 
            function (Blueprint $table) {
                $table->string('token')->nullable();
            }
        );
    }

    public function down() {
    }
}
