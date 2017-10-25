<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(CurrenciesTableSeeder::class);
//         $this->call(ManufacturersTableSeeder::class);
//         $this->call(MerchantsTableSeeder::class);
//         $this->call(ProgramsTableSeeder::class);
         $this->call(GoodsTableSeeder::class);
    }
}
