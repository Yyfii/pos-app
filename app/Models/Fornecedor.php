<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{

    protected $table = 'Fornecedores';

    // Relacionamento inverso
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_fornecedor');
    }        
    protected $primaryKey = 'id_fornecedor';
        
    public $timestamps = false;
        
    protected $fillable = [
        'nome',
        'email',
        'cnpj',
        'telefone',
    ];
}
