<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'comissao'
    ];
    
    public function vendas()
    {
        return $this->hasMany('App\Vendas');
    }
}
