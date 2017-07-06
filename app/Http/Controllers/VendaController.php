<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VendasRequest;
use App\Vendas;
use App\Vendedor;

class VendaController extends Controller
{
    private $vendas;
    private $vendedor;
    
    public function __construct(Vendas $vendas, Vendedor $vendedor) 
    {
        $this->vendas = $vendas; 
        $this->vendedor = $vendedor;
    }

    public function listarAll(Request $request)
    {   
        $id = $request->vendedor_id;
        $total = 0;
        
        $vendasVendedor = $this->vendedor
                               ->where('id', '=', $id)
                               ->with('vendas')
                               ->first();
        if(!empty($vendasVendedor)){
             $response['vendedor']  = array(
                        'id' => $vendasVendedor->id,  
                        'vendedor' => $vendasVendedor->nome,
                        'email' => $vendasVendedor->email
            );
            foreach ($vendasVendedor->vendas as $venda):
                $valor  = number_format($venda['valor_venda'], 2);
                $data =  date("d M Y", strtotime($venda['created_at']));
                               
                $response['vendas'][] = array(
                        'id' =>$venda->id,
                        'valor_venda R$' => $valor,  
                        'data_venda' => $data,

                );
            endforeach;
            
            foreach($response['vendas'] as $value):
                $total+= $value['valor_venda R$'];
            endforeach;
            
            $response['Total de Vendas do Dia'] = number_format($total, 2);
            return response()->json($response);
        } else{
            $response[] = array(
               'mensagem' => 'Nunhum dado encontrado!',
           ); 
           return response()->json($response);
        }
    }
    
    public function store(VendasRequest $request)
    { 
        if($id = $this->vendas->create([
                        'vendedor_id' => $request->vendedor_id,
                        'valor_venda' => $request->valor_venda,
                        ])->id
         ){
            
          $venda = $this->vendas
                    ->where('id', '=', $id)
                   ->with('vendedor')->first();
          
          $data =  date("d M Y", strtotime($venda['created_at']));
          
          $response[]  = array(
                        'id' => $venda->id,  
                        'vendedor' => $venda->vendedor->nome,
                        'email' => $venda->vendedor->email,
                        'valor_venda' => $venda->valor_venda,
                        'valor_comissao' => $venda->vendedor->comissao,
                        'data_venda' => $data
                  );
          
            return response()->json($response);
                        
         } else { 
             $response[] = array(
               'mensagem' => 'Erro ao cadastrar dados.',
           ); 
           return response()->json($response);
         }
        
    }
}
