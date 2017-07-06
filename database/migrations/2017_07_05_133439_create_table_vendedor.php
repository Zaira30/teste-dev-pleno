<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVendedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 255);
            $table->string('email', 255);
            $table->double('comissao', 4, 2);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        
        // Insert
        DB::table('vendedors')->insert(
            array(
                array(
                    'nome' => 'João da Silva',
                    'email' => 'joao.silva@gmail.com',
                    'comissao' => '8.5'
                ),
                array(
                    'nome' => 'Maria Costa oliveira',
                    'email' => 'maria_costa24@gmail.com',
                    'comissao' => '8.5'
                ),
                array(
                    'nome' => 'Pedro Mendonça Filho',
                    'email' => 'mendonca.filho@gmail.com',
                    'comissao' => '8.5'
                ),
                array(
                    'nome' => 'Bartolomeu Amorim',
                    'email' => 'bart.amorim@gmail.com',
                    'comissao' => '8.5'
                )
                    
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vendedor');
    }
}
