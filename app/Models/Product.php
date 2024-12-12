<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa o trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Produtos';
    protected $primaryKey = 'id_produto';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade_em_estoque',
        'id_categoria',
        'id_fornecedor',
        'foto',
    ];
    
}
