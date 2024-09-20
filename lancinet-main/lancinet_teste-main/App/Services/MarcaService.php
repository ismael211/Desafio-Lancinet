<?php 

namespace App\Services;

use App\Models\Marca;

class MarcaService
{
    public function buscar_marca($nome_marca)
    {
        return Marca::where('nome_marca', $nome_marca)->first();
    }
}
