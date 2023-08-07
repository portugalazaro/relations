<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class invoiceController extends Controller
{
    public function index() 
    {
        // retornando todos os invoices do Banco de dados
        return Invoice::all();

    }

    public function createInvoice(Request $request)
    {
        // Retornando o invoice que foi criado
        // aqui estou passando todos os dados da requisição direto para o construtor do model
        // o corretor seria voce fazer validações desses dados que estão sendo passado direto para o model
        return Invoice::create($request->all());
    }

    public function findOne(Request $request)
    {
        // verificando se é uma string numerica, 
        if(is_numeric($request->id)) {
            
            // Verificano se o id existe no banco de dados 
            if($invoice =  Invoice::find($request->id)) {

                // pegando o relacionamento de invoice com user
                $usuario = $invoice->userId;

                // montando o retorno 
                $dados = [
                    'id' => $invoice->id,
                    'description' => $invoice->description,
                    'valor' => $invoice->valor,
                    'user' => $usuario
                ];

                return $dados;
            }
        }
        return 'id inválido!';
    }
}
