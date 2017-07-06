<?php

use Illuminate\Database\Seeder;
use App\Vendedor;

class VendedorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory('App\Vendedor', 10)->create();
    }
}
