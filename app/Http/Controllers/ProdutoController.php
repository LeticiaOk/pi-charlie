<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria; // Importar o modelo Categoria
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        // Obter a categoria_id da solicitação, se disponível
        $categoriaId = $request->input('categoria_id');

        // Buscar produtos por categoria
        $produtos = Produto::with(['imagens', 'categoria']);

        if ($categoriaId) {
            $produtos = $produtos->where('CATEGORIA_ID', $categoriaId);
        }

        $produtos = $produtos->get();

        // Retorna a view passando os produtos e as categorias
        $categorias = Categoria::all(); // Pega todas as categorias para o filtro
        return view('pages.shop', compact('produtos', 'categorias'));
    }
}
