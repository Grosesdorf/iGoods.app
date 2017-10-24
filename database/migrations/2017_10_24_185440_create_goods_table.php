<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->string('id', 32);
            $table->primary('id');
            $table->string('name', 100);
            $table->text('description');
            $table->dateTimeTz('modified');
            $table->decimal('price', 10, 2);
            $table->decimal('price_old', 10, 2);
            $table->decimal('shipping_costs', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
