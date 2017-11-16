<?php

use Cmgmyr\Messenger\Models\Models;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {
    public function up() {
        Schema::create(Models::table('messages'), function (Blueprint $table) {
            $table->uuid('id')->default(
                DB::raw('uuid_generate_v4()')
            );
            $table->uuid('thread_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Models::table('messages'));
    }
}
