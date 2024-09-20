<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

    protected $fillable = ['nome_marca', 'fabricante'];

    public function campos()
    {
        return $this->hasMany(Campos::class, 'marca_produto', 'id');
    }
}
