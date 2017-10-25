<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'Euroschirm'
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'ODESSA CABLE WORKS'
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'YUZHMASH'
        ]);
    }
}
