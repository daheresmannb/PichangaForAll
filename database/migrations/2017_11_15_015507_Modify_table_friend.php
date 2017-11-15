<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableFriend extends Migration {

    public function up() {

      Schema::table(
        'friendships',
        function ($table) {
            $table->dropColumn('sender_id');
            $table->dropColumn('recipient_id');
        }
      );

        Schema::table(
          'friendships',
          function ($table) {
              $table->uuid('sender_id')->nullable();
              $table->uuid('recipient_id')->nullable();
          }
        );
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
