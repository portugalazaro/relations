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
            $user =  User::find($request->id);
            $user['address'] = $user->address;
            return $user;
        }

        return 'deu merda1';

    }


    public function createUser(Request $request)
    {
        $data = [
            'name' => trim(htmlspecialchars($request->name)),
            'email' => trim(htmlspecialchars($request->email)),
            'password' => trim(htmlspecialchars($request->password)),
            'address_id' => trim(htmlspecialchars($request->address_id))
        ];

        ;
        if(empty($data['address_id'])){
            $data['address_id'] = null;
        }

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
        User::where('id', '>', 0)->delete();
        // $post = Post::where('id', '>', 0)->delete();
    }

}
