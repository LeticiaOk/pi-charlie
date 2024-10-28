<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produtosChocolate = Produto::with(['imagens', 'categoria'])
            ->whereHas('categoria', function($query){
                $query->where('CATEGORIA_NOME', 'Chocolate');
            })
            ->get();

        $produtosBolo = Produto::with(['imagens', 'categoria'])
            ->whereHas('categoria', function($query){
                $query->where('CATEGORIA_NOME', 'Bolo (Variados)');
            })
            ->get();

        return view('pages.home', compact('produtosChocolate', 'produtosBolo'));
    }
}
