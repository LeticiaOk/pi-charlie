<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\CarrinhoItem;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
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

    public function show($id)
    {
        $produto = Produto::with(['imagens', 'categoria', 'estoque'])->findOrFail($id);

        return view('pages.show', compact('produto'));
    }

    public function adicionarCarrinho(Request $request, $id)
    {
        $usuarioId = Auth::id(); // Obter o ID do usuário autenticado
        $produtoId = $id;
        $quantidade = $request->input('quantidade', 1); // Quantidade padrão = 1

        // Verifica se o item já está no carrinho
        $itemExistente = CarrinhoItem::where('USUARIO_ID', $usuarioId)
            ->where('PRODUTO_ID', $produtoId)
            ->first();

        if ($itemExistente) {
            // Se já existir, atualiza a quantidade
            $itemExistente->ITEM_QTD += $quantidade;
            $itemExistente->save();
        } else {
            // Caso contrário, cria um novo item no carrinho
            CarrinhoItem::create([
                'USUARIO_ID' => $usuarioId,
                'PRODUTO_ID' => $produtoId,
                'ITEM_QTD' => $quantidade,
            ]);
        }

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function verCarrinho()
    {
        $usuarioId = Auth::id(); // Obter o ID do usuário autenticado

        // Buscar itens do carrinho do usuário com os detalhes do produto e suas imagens
        $itensCarrinho = CarrinhoItem::with(['produto.imagens'])
            ->where('USUARIO_ID', $usuarioId)
            ->get();

        return view('pages.carrinho', compact('itensCarrinho'));
    }

    public function aumentarQuantidade($id)
    {
        $usuarioId = Auth::id();

        // Buscar o item no carrinho
        $item = CarrinhoItem::where('USUARIO_ID', $usuarioId)
                            ->where('PRODUTO_ID', $id)
                            ->first();

        if ($item) {
            // Incrementar a quantidade
            $item->ITEM_QTD += 1;
            $item->save();
        }

        return redirect()->route('carrinho');
    }

    public function diminuirQuantidade($id)
    {
        $usuarioId = Auth::id();

        // Buscar o item no carrinho
        $item = CarrinhoItem::where('USUARIO_ID', $usuarioId)
                            ->where('PRODUTO_ID', $id)
                            ->first();

        if ($item && $item->ITEM_QTD > 1) {
            // Decrementar a quantidade
            $item->ITEM_QTD -= 1;
            $item->save();
        } elseif ($item) {
            // Remover o item se a quantidade for 1
            $item->delete();
        }

        return redirect()->route('carrinho');
    }
}
