<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => 'EUR',
            'country' => 'EU'
        ]);

        DB::table('currencies')->insert([
            'name' => 'UAH',
            'country' => 'Ukraine'
        ]);

        DB::table('currencies')->insert([
            'name' => 'RUB',
            'country' => 'Russia'
        ]);

        DB::table('currencies')->insert([
            'name' => 'USD',
            'country' => 'USA'
        ]);
    }
}
