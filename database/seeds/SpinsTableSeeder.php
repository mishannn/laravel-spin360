<?php

use Illuminate\Database\Seeder;

class SpinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('spins');

        if (!$table->where('name', '=', 'newhouse')->exists()) {
            $table->insert([
                'name' => 'newhouse',
                'title' => 'Новый дом',
                'frames_count' => 38,
                'invert_rotation' => false,
                'rotation_speed' => 0.2,
            ]);
        }
    }
}
