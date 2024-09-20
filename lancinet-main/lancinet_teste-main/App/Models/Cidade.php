<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';

    protected $fillable = ['nome_cidade'];

    public function campos()
    {
        return $this->hasMany(Campos::class, 'cidade', 'id');
    }
}
