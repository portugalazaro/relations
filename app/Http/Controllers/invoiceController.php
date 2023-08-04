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
        return Invoice::create($request->all());
    }

    public function findOne(Request $request)
    {
        // verificando se é uma string numerica, 
        if(is_numeric($request->id)) {
            $invoice =  Invoice::find($request->id);
            $invoice['user_id'] = $invoice->userId->name;
            // return $invoice->userId;
            return $invoice;
        }

        return 'id inválido!, hacker vagabundo';
    }
}
