<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = DB::table('users');

        if (!$table->where('username', '=', 'admin')->exists()) {
            $table->insert([
                'username' => 'admin',
                'password' => '12345',
            ]);
        }
    }
}
