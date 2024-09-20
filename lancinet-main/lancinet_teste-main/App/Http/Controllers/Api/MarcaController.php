<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

use App\Services\MarcaService;


class MarcaController extends Controller
{

    protected $marcaService;


    public function __construct(MarcaService $marcaService)
    {
        $this->marcaService = $marcaService;
    }

    public function buscarMarca(Request $request)
    {

        $query = Marca::query();

        // Verificar se foi passado um nome da marca
        if ($request->filled('nome_marca')) {
            $query->where('nome_marca', '=', $request->input('nome_marca'));        }

        // Verificar se foi passado
        if ($request->filled('fabricante')) {
            $query->where('fabricante', '=', $request->input('fabricante'));        }

        // Executar a consulta e retornar os resultados
        $resultados = $query->get();
    
        if ($resultados->isEmpty()) {
            return response()->json(['message' => 'Nenhuma marca foi encontrada'], 200);
        }
    
        return response()->json(['message' => 'ok', 'data' => $resultados], 200);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Marca::all();
    }

   
    public function salvarMarca(Request $request)
    {
        // Cria nova Marca
        $novoMarca = Marca::create($request->all());
        
        // Retornar o ID do registro criado
        return response()->json([
            'message' => 'ok',
            'id' => $novoMarca->id
        ], 201);
    }

    
    public function deleteMarca(string $id)
    {
        // Implementar a lógica para deletar a Cidade
        $midade = Marca::findOrFail($id);
        $midade->delete();
        
        // Retorna uma resposta com status 200 e a mensagem "ok"
        return response()->json(['message' => 'ok'], 200);
    }

}
