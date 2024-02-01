<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogo extends Model
{
    use HasFactory;

    protected $fillable= [ //colunas da minha tabela que podem ser preenchidas
        'nome',
        'categoria',
        'ano_criacao',
        'valor',
    ];
}
