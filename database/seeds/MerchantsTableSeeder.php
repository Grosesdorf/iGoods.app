    <?php

use Illuminate\Database\Seeder;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('merchants')->insert([
            'category' => 'Accessoires',
            'email' => str_random(10).'@test.com'
        ]);

        DB::table('merchants')->insert([
            'category' => 'Regenschirme',
            'email' => str_random(10).'@test.com'
        ]);
    }
}
