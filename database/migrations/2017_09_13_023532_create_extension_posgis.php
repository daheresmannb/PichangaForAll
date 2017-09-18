<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtensionPosgis extends Migration {

    public function up() {
        DB::connection()->getPdo()->exec(
        	'CREATE EXTENSION IF NOT EXISTS postgis;'
      	);
    }

    public function down() {
    }
}
