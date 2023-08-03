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
            return Invoice::find($request->id);
        }

        return 'id inválido!, hacker vagabundo';
    }
}
