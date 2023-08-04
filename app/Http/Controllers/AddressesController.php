<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class AddressesController extends Controller
{
    public function index(Request $request) 
    {
        return Addresses::all();
        // return $request->all();
    }


    public function findOne(Request $request)
    {
        if(is_numeric($request->id) && Addresses::find($request->id)) {
            $address =  Addresses::find($request->id);
            $address['user'] = $address->user;
            return $address;
        }

        return 'deu merda';
    }



    public function createAddresses(Request $request)
    {
        // return $request->all();

        // criando um novo endereço
        return Addresses::create($request->all());

    }
}
