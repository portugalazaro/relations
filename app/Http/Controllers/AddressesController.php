<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class AddressesController extends Controller
{
    // retornando todos os endereços do banco
    public function index(Request $request) 
    {
        return Addresses::all();
        // return $request->all();
    }


    // retorna um endereço em especifico 
    public function findOne(Request $request)
    {
        // veriica se o id é um numero ou string numerica, depois verifica se o id existe no banco
        if(is_numeric($request->id) && $address = Addresses::find($request->id)) {
            // $address =  Addresses::find($request->id);
            // adicionando informações do usuário relacionado com aquele endereço
            $address['user'] = $address->user;
            return $address;
        }

        return 'deu merda';
    }



    // criando um novo endereço
    public function createAddresses(Request $request)
    {
        // passando os dados da requisição direto para o construtor do model
        // o certo seria fazer uma validação desses dados
        return Addresses::create($request->all());

    }
}
