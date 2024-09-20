<?php

namespace App\Http\Controllers\Api;

use Yajra\DataTables\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Campos;
use App\Models\Marca;
use App\Models\Cidade;



class CamposController extends Controller
{
    // Relacionamento com a tabela "cidades"
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade', 'id');
    }

    // Relacionamento com a tabela "marcas"
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_produto', 'id');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Campos::all();
    }
    public function getProdutos()
    {

        $produtos = Campos::with(['cidade', 'marca'])->get()->toArray();

        return DataTables::of($produtos)
            ->addColumn('nome_cidade', function ($produto) {
               
                return isset($produto['cidade']) ? $produto['cidade']['nome_cidade'] : 'Sem cidade';
            })
            ->addColumn('nome_marca', function ($produto) {
               
                return isset($produto['marca']) ? $produto['marca']['nome_marca'] : 'Sem marca';
            })
            ->addColumn('fabricante', function ($produto) {
                
                return isset($produto['marca']) ? $produto['marca']['fabricante'] : 'Sem fábrica';
            })
            ->make(true);

    }

    
    public function salvarCampo(Request $request)
    {

        $validatedData = $request->validate([
            'nome_produto' => 'required|string|max:255',
            'valor_produto' => 'required|numeric',
            'estoque' => 'required|integer',
            'marca_produto' => 'required|exists:marcas,id',
            'cidade' => 'required|exists:cidades,id',
        ]);

        // Criação do registro
        Campos::create($validatedData);

        return response()->json(['message' => 'ok'], 201);
    }


    public function buscarProduto(Request $request)
    {

        $query = Campos::with(['cidade', 'marca']);

      
        if ($request->filled('id')) {
            $query->where('id', 'like', '%' . $request->input('id') . '%');
        }

 
        if ($request->filled('nome_produto')) {
            $query->where('nome_produto', 'like', '%' . $request->input('nome_produto') . '%');
        }
   
 
        $produtos  = $query->get()->toArray();

        // Retorna os resultados no formato esperado pelo DataTables
        return DataTables::of($produtos )
            ->addColumn('nome_cidade', function ($produto) {
              
                return isset($produto['cidade']) ? $produto['cidade']['nome_cidade'] : 'Sem cidade';
            })
            ->addColumn('nome_marca', function ($produto) {
              
                return isset($produto['marca']) ? $produto['marca']['nome_marca'] : 'Sem marca';
            })
            ->addColumn('fabricante', function ($produto) {
                
                return isset($produto['marca']) ? $produto['marca']['fabricante'] : 'Sem fábrica';
            })
            ->make(true);

    }


    public function consultarProduto(Request $request)
    {
        $nomeProduto = $request->input('nome_produto');
    
        $produto = Campos::where('nome_produto', '=', $nomeProduto)->get();

     
        if ($produto) {

            $totalProdutos = $produto->count();

            return response()->json([
                'success' => true,
                'message' => 'ok',
                'total' => $totalProdutos,
                'data' => $produto
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado'
            ], 200); 
        }
    }


    public function statsProdutos()
    {
        $query = Campos::query();
    
    
        // Calcula a média e a soma dos valores dos produtos filtrados
        $mediaValor = $query->avg('valor_produto');
        $somaValor = $query->sum(Campos::raw('valor_produto * estoque'));
    
        $totalEstoque = $query->sum('estoque'); // Quantidade total de produtos no estoque
        $somaValorPonderada = $query->sum(Campos::raw('valor_produto * estoque')); // Soma ponderada pelos estoques
        
        // Cálculo da média ponderada
        if ($totalEstoque > 0) {
            $mediaValor = $somaValorPonderada / $totalEstoque;
        } else {
            $mediaValor = 0; // Evita divisão por zero
        }

        // Retorna os produtos, média e soma para o front-end
        return response()->json([          
            'media_valor' => $mediaValor,
            'soma_valor' => $somaValor
        ]);
    }
    

    public function verificaProduto(Request $request)
    {

        $query = Campos::query();

        // Verificar se foi passado marca
        if ($request->filled('marca_produto')) {
            $query->where('marca_produto', 'like', '%' . $request->input('marca_produto') . '%');
        }

       
        if ($request->filled('cidade')) {
            
            $query->where('cidade', 'like', '%' . $request->input('cidade') . '%');

        }
         
   
        $resultados = $query->get();
    
        if ($resultados->isEmpty()) {
            return response()->json(['message' => 'Nenhum produto encontrado'], 200);
        }
    
        return response()->json(['message' => 'ok', 'data'=>$resultados], 200);

    }


    public function deleteProduto(string $id)
    {
        // Encontrar o produto pelo ID
        $campo = Campos::findOrFail($id);
    
        // Verificar se o estoque é maior que 0
        if ($campo->estoque > 0) {
            // Retorna uma resposta de erro, informando que não é possível excluir
            return response()->json([
                'success' => false,
                'message' => 'Não é possível excluir o produto. O estoque ainda é maior que 0.'
            ],200);
        }
    
        // Se o estoque for 0, exclui o produto
        $campo->delete();
    
        // Retorna uma resposta de sucesso
        return response()->json([
            'success' => true,
            'message' => 'ok'
        ], 200);
    }

        /**
     * Atualiza o produto com base no ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $this->validateRequest($request);

        // Busca o produto pelo ID
        $produto = $this->findProdutoById($id);

        // Atualiza os dados do produto
        $this->updateProduto($produto, $request);

        // Retorna a resposta de sucesso
        return response()->json([
            'message' => 'Produto atualizado com sucesso',
            'produto' => $produto
        ]);
    }

    /**
     * Valida os dados de entrada da requisição.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome_produto' => 'required|string|max:255',
            'valor_produto' => 'required|numeric',
            'estoque' => 'required|integer',
            'marca_produto' => 'required|exists:marcas,id',
            'cidade' => 'required|exists:cidades,id',
        ]);
    }

    /**
     * Busca o produto pelo ID.
     *
     * @param  int  $id
     * @return \App\Models\Campos
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    private function findProdutoById($id)
    {
        return Campos::findOrFail($id);
    }

    /**
     * Atualiza os dados do produto.
     *
     * @param  \App\Models\Campos  $produto
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    private function updateProduto(Campos $produto, Request $request)
    {
        $produto->update([
            'nome_produto' => $request->input('nome_produto'),
            'valor_produto' => $request->input('valor_produto'),
            'estoque' => $request->input('estoque'),
            'marca_produto' => $request->input('marca_produto'),
            'cidade' => $request->input('cidade'),
        ]);
    }

}
