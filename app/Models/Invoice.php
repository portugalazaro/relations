<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Os dados que vão ser passado dentro do construtor do model
    protected $fillable = [
        'description',
        'valor',
        'address_id',
        'user_id'
    ];

    // ocultando o campo user_id do retorno do model
    protected $hidden = [
        'user_id'
    ];

    // nome da tabela no banco de dados
    protected $table = 'invoice';


    // relacionamento com a tabela address
    public function address()
    {
        /*
            1 - nome do model que tem relacionamento
            2 - O campo id refere-se ao model Addresses
            3 - O campo address_id refere-se ao model invoice
            4 - O nome da tabela
        */ 
        return $this->hasOne(Addresses::class,'id', 'address_id', 'addresses');
    }

    // relacionamento com a tabela user
    public function userId()
    {
        return $this->hasOne(User::class, 'id', 'user_id', 'users');
    }
}
