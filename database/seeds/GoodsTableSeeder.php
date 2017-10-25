<?php

use Illuminate\Database\Seeder;
use App\Program;
use App\Manufacturer;
use App\Merchant;
use App\Goods;
use Carbon\Carbon;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 26; $i++)
        {
            $program = Program::inRandomOrder()->first();
            $manufacturer = Manufacturer::inRandomOrder()->first();
            $merchant = Merchant::inRandomOrder()->first();

            DB::table('goods')->insert([
                'id' => md5(microtime()),
                'name' => 'Goods-'.$i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
//                'modified' => date('Y-m-dTG:i:sZ'),
                'modified' => Carbon::now(),
                'price' => 100.20,
                'price_old' => 99.99,
                'shipping_costs' => 2.50,
                'currency_id' => 1,
                'program_id' => $program->id,
                'manufacturer_id' => $manufacturer->id,
                'merchant_id' => $merchant->id,
                'ean' => 4 . mt_rand(100000,999999) . mt_rand(100000,999999),
                'image' => 'storage/img/basket-'.$i.'.png',
            ]);

            sleep(10);
        }
    }
}
