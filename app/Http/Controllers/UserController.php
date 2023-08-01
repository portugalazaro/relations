<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::all();
    }


    public function findOne(Request $request)
    {

        if(is_numeric($request->id) && User::find($request->id)) {
            return User::find($request->id);
        }

        return 'deu merda1';

    }


    public function createUser(Request $request)
    {
        $data = [
            'name' => trim(htmlspecialchars($request->name)),
            'email' => trim(htmlspecialchars($request->email)),
            'password' => trim(htmlspecialchars($request->password))
        ];


        // all() -> pega todos os dados enviado na requisicao
        // $request->all();

        // only(['campos...']) -> pega somente os dados especificados da requisicao dentro do array
        // $data = $request->only(['name','email', 'password']);

        return User::create($data);

    }

}
