<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos');
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('show');
Route::post('/carrinho/adicionar/{id}', [ProdutoController::class, 'adicionarCarrinho'])->name('carrinho.adicionar');
Route::get('/carrinho', [ProdutoController::class, 'verCarrinho'])->name('carrinho');
Route::post('/carrinho/aumentar/{id}', [ProdutoController::class, 'aumentarQuantidade'])->name('carrinho.aumentar');
Route::post('/carrinho/diminuir/{id}', [ProdutoController::class, 'diminuirQuantidade'])->name('carrinho.diminuir');
Route::get('/endereco', [EnderecoController::class, 'form'])->name('endereco.form');
Route::post('/endereco', [EnderecoController::class, 'salvar'])->name('endereco.salvar');
Route::get('/pedidostatus', [PedidoController::class, 'form'])->name('pedidostatus.form');
Route::post('/pedidostatus', [PedidoController::class, 'salvarStatus'])->name('pedidostatus.salvarStatus');
Route::get('/pedido', [PedidoController::class, 'formPedido'])->name('pedido.form');
Route::post('/pedido', [PedidoController::class, 'salvarPedido'])->name('pedido.salvar');

Route::get('/historico-pedidos', [PedidoController::class, 'historicoPedidos'])->name('historico.pedidos');

require __DIR__.'/auth.php';
