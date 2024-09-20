<?php
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CamposController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\MarcaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------

| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('campos/buscar', [CamposController::class, 'buscarProduto']);

Route::get('campos/verificar', [CamposController::class, 'verificaProduto']);

Route::get('marca/buscar', [MarcaController::class, 'buscarMarca']);

Route::get('/produtos', [CamposController::class, 'getProdutos']);


Route::put('/produtos/{id}', [CamposController::class, 'update']);

Route::get('/dados', [CamposController::class, 'statsProdutos']);

Route::post('/cidade/salvar', [CidadeController::class, 'salvarCidade']);

Route::post('/marca/salvar', [CidadeController::class, 'salvarMarca']);

Route::post('/campos/salvar', [CidadeController::class, 'salvarCampo']);

Route::get('/cidades', [CidadeController::class, 'apiGetCidades']);

Route::get('cidade/buscar', [CidadeController::class, 'buscarCidade']);

Route::delete('/cidades/{id}', [CidadeController::class, 'deleteCidade']);

Route::delete('/produtos/{id}', [CamposController::class, 'deleteProduto']);

Route::delete('/marcas/{id}', [MarcaController::class, 'deleteMarca']);

// Route::apiResource('campos', CamposController::class);
// Route::apiResource('cidade', CidadeController::class);
// Route::apiResource('marca', MarcaController::class);