<?php

use Cmgmyr\Messenger\Models\Models;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create(Models::table('participants'), function (Blueprint $table) {
            $table->uuid('id')->default(
                DB::raw('uuid_generate_v4()')
            );
            $table->uuid('thread_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->timestamp('last_read')->nullable();
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
        Schema::dropIfExists(Models::table('participants'));
    }
}
