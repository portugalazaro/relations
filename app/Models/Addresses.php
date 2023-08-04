<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    public $table = "addresses";

    protected $fillable = [
        'addresses',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];
    
    use HasFactory;


    public function user()
    {
        // pega o relacionamento entre addresses e user
        // Um user pode ter 1 ou mais endereços
        return $this->belongsTo(User::class, 'user_id', 'id', 'users');
    }

}
