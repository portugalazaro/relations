<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    // nome da tabela no banco de dados, laravel usa esse nome para pegar informações da tabela
    public $table = "addresses";

    // campos que podem ser passados para o construtor do model de Addresses
    protected $fillable = [
        'addresses',
        'user_id'
    ];

    // Campo(s) que vão ser oculto(s) no retorno do model Addresses
    protected $hidden = [
        'user_id'
    ];
    
    use HasFactory;

    /*
        O relacionamento fica onde você vai partir sua busca, nesse caso eu quero buscar o ENDRECO
        e retorna o usuário que está relacionado a ele, por isso o nome do metodo é user, porque vai 
        retornar o usuário que pertence aquele id 
    */ 
    public function user()
    {
        // pega o relacionamento entre addresses e user
        // Um Usuário pode ter 1 ou mais endereços
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
        
        // belongsTo -> muitos para um

    }

}
