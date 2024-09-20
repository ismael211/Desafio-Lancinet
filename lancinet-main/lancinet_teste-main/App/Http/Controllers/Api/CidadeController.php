<?php

namespace App\Http\Controllers\Api;

use Yajra\DataTables\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;


class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cidade::all();
    }

    public function apiGetCidades()
    {

        return DataTables::of(Cidade::query())->make(true);

    }


    public function buscarCidade(Request $request)
    {

        $query = Cidade::query();   

        // Verificar se foi passado
        if ($request->filled('nome_cidade')) {
            $query->where('nome_cidade', '=', $request->input('nome_cidade'));        }

        // Executar a consulta e retornar os resultados
        $resultados = $query->get();

        if ($resultados->isEmpty()) {
            return response()->json([
                'success' => false,
                'resultado' => '0', //cidade não encontrada
                'message' => 'Cidade não encontrada.'
            ], 200); 
        }
        return response()->json([
            'success' => true,
            'resultado' => '1', //cidade encontrada
            'message' => 'ok',
            'data' => $resultados
        ], 200);

    }


    public function salvarCidade(Request $request)
    {
        $novoRegistro = Cidade::create($request->all());

        // Retornar o ID da cidade
        return response()->json([
            'message' => 'ok',
            'id' => $novoRegistro->id
        ], 201);
    }


    public function deleteCidade(string $id)
    {
       
        $midade = Cidade::findOrFail($id);
        $midade->delete();
        
        // Retorna uma resposta com status 200 e a mensagem "ok"
        return response()->json(['message' => 'ok'], 200);
    }
}
