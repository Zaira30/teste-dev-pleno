<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class VendedorController extends Controller
{
    private $vendedor;
    
    public function __construct(Vendedor $vendedor) 
    {
        $this->vendedor = $vendedor; 
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = $this->vendedor->all();
        return $vendedores;
    }
    
   
    public function store(Request $request) 
    {        
        if($id = $this->vendedor->create([
                        'nome' => $request->nome,
                        'email' => $request->email,
                        ])->id
         ){
            
          $vendedor = $this->vendedor
                    ->where('id', '=', $id)
                    ->first();
          
          $response[]  = array(
                        'id' => $vendedor->id,  
                        'nome'  => $vendedor->nome,
                        'email' => $vendedor->email,
                  );
          
            return response()->json($response);
                        
         } else { 
             
             $response[] = array(
               'mensagem' => 'Erro ao cadastrar vendedor.',
             ); 
             
           return response()->json($response);
         }
    }

    public function listarAll()
    {
        $vendedores = $this->vendedor->all();
        foreach ($vendedores as $vendedor):
         $response[]  = array(
            'id' => $vendedor['id'],  
            'nome' => $vendedor['nome'],
            'email' => $vendedor['email'],
            'comissao' => $vendedor['comissao']
        );
        endforeach;
        return response()->json($response);
    }
}
