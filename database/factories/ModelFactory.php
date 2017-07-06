<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Vendedor::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'comissao' => $faker->randomFloat(3, 8.5, 8.5)
    ];
});

$factory->define(App\Vendas::class, function (Faker\Generator $faker) {
    $vendedor = DB::table('vendedors')->lists('id');
    return [
        'vendedor_id' =>  $faker->randomElement($vendedor),
        'valor_venda' => $faker->randomFloat(10,2)
    ];
});
