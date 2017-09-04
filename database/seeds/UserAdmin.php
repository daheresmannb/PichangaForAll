<?php

use Illuminate\Database\Seeder;

class UserAdmin extends Seeder {
    public function run() {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin',
            'password' => bcrypt('admin'),
        ]);
    }
}