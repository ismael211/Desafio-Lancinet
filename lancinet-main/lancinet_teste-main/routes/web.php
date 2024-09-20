<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CamposController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\MarcaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {

    return view('home');

});

Route::post('/salvar-produto', [CamposController::class, 'salvarCampo'])->name('produto.salvar');

Route::get('/buscar-produto', [CamposController::class, 'buscarProduto'])->name('buscar.produto');

Route::get('/verificar-produto', [CamposController::class, 'verificaProduto']);

Route::get('/consultar-produto', [CamposController::class, 'consultarProduto'])->name('consultar.produto');

Route::get('/dados', [CamposController::class, 'statsProdutos'])->name('stats.produto')->name('estatisticas.produto');

Route::get('/produtos', [CamposController::class, 'getProdutos']);

Route::put('/produtos/{id}', [CamposController::class, 'update'])->name('produtos.update');


Route::get('/buscar-marca', [MarcaController::class, 'buscarMarca'])->name('buscar.marca');

Route::post('/salvar-marca', [MarcaController::class, 'salvarMarca'])->name('marca.salvar');

Route::post('/salvar-cidade', [CidadeController::class, 'salvarCidade'])->name('cidade.salvar');

Route::get('/cidades', [CidadeController::class, 'getCidades']);

Route::get('/buscar-cidade', [CidadeController::class, 'buscarCidade']);


Route::delete('/produtos/{id}', [CamposController::class, 'deleteProduto']);

Route::delete('/cidades/{id}', [CidadeController::class, 'deleteCidade']);

Route::delete('/marcas/{id}', [MarcaController::class, 'deleteMarca']);
