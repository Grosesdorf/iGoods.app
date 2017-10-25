<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'name' => '"Fashion24 DE',
            'code' => str_random(5)
        ]);

        DB::table('programs')->insert([
            'name' => '"Fashion24 RU',
            'code' => str_random(5)
        ]);

        DB::table('programs')->insert([
            'name' => '"Fashion24 UA',
            'code' => str_random(5)
        ]);
    }
}
