<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
        'vendedor_id',
        'valor_venda'
    ];
    
    public function vendedor() 
    {
        return $this->belongsTo('App\Vendedor');
    }
}
