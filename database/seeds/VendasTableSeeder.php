<?php

use Illuminate\Database\Seeder;
use App\Vendas;

class VendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Vendas', 15)->create();
    }
}
