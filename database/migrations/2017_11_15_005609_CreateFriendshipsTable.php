<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipsTable extends Migration {
    public function up() {
        Schema::create('friendships', function (Blueprint $table) {
          $table->uuid('id')->default(
              DB::raw('uuid_generate_v4()')
          );
            $table->morphs('sender');
            $table->morphs('recipient');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('friendships');
    }
}
