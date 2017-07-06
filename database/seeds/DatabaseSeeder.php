<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement("TRUNCATE TABLE vendedors");
        DB::statement("TRUNCATE TABLE vendas");
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        factory('App\Vendedor', 10)->create();
        factory('App\Vendas', 15)->create();
        // create
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        Model::reguard();
    }
}
