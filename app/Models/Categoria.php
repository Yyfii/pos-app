<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'Categorias';
    
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_categoria');
    }

    
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;
    protected $fillable = [
        'nome',
    ];
}
