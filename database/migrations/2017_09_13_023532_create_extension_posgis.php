<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtensionPosgis extends Migration {

    public function up() {
        //DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
        DB::raw("\c taller4;");
        DB::raw('CREATE EXTENSION IF NOT EXISTS postgis;');
    }

    public function down() {
        //
    }
}
