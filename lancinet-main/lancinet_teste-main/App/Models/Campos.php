<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campos extends Model
{
    protected $table = 'campos';

    protected $fillable = ['nome_produto', 'valor_produto', 'estoque', 'marca_produto', 'cidade'];


  // Relacionamento com a tabela "cidades"
  public function cidade()
  {
    return $this->belongsTo(Cidade::class, 'cidade', 'id');
  }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_produto', 'id');
    }
}
