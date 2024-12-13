<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa o trait HasFactory
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Produtos';

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
    
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
