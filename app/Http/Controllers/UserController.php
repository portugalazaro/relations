<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Retorna todos os usuários cadastrados no banco
    public function index(Request $request)
    {
        return User::all();
    }


    // Retorna somente o usuário que foi passado na busca (ID)
    public function findOne(Request $request)
    {

        // verifica se o id passado é um numero ou string numerica e
        // busca no banco o usuário com esse ID
        if(is_numeric($request->id) && User::find($request->id)) {

            $user =  User::find($request->id);
            // Populando o retorno do usuário com os endereços que pertence a ele 
            $user['address'] = $user->address;
            // retornando todas a informações do usuário 
            return $user;
        }

        return 'deu merda';

    }


    // Criando um usuário
    public function createUser(Request $request)
    {
        // fazendo uma pequena validação nos campos que estão sendo enviados pelo usuário
        $data = [
            'name' => trim(htmlspecialchars($request->name)),
            'email' => trim(htmlspecialchars($request->email)),
            'password' => trim(htmlspecialchars($request->password)),
        ];


        // all() -> pega todos os dados enviado na requisicao
        // $request->all();

        // only(['campos...']) -> pega somente os dados especificados da requisicao dentro do array
        // $data = $request->only(['name','email', 'password', 'address_id ']);
        
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->address_id = $request->address_id;

        // return $user->save();

        return User::create($data);

    }



    public function dell(Request $request) 
    {
        // Deletando todos os usuários do banco
        User::where('id', '>', 0)->delete();
        
        // where -> id campo para ser avaliada a condição 
        // > condição
        // 0
        
        // delete todos os usuários em que o id for MAIOR que zero
    }

}
