<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    public $table = "addresses";

    protected $fillable = [
        'addresses'
    ];

    use HasFactory;
}
