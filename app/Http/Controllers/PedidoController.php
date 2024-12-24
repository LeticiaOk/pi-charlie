<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoStatus;
use App\Models\Endereco;
use App\Models\CarrinhoItem;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;



class PedidoController extends Controller
{
    public function form()
    {
        return view('pages.status');
    }

    public function salvarStatus(Request $request)
    {
        // Validação do campo STATUS_DESC
        $request->validate([
            'STATUS_DESC' => 'required|string|max:255',
        ]);

        // Salvando o status no banco de dados
        PedidoStatus::create([
            'STATUS_DESC' => $request->STATUS_DESC,
        ]);

        return redirect()->route('pedido.form')->with('success', 'Status salvo com sucesso!');
    }

    public function formPedido()
    {
        $enderecos = Endereco::where('USUARIO_ID', Auth::id())->get();
        $statusList = PedidoStatus::all();

        return view('pages.pedido', compact('enderecos', 'statusList'));
    }

    public function salvarPedido(Request $request)
    {
        // Validação dos campos do pedido
        $request->validate([
            'ENDERECO_ID' => 'required|exists:ENDERECO,ENDERECO_ID',
            'STATUS_ID' => 'required|exists:PEDIDO_STATUS,STATUS_ID',
        ]);

        // Criando o pedido no banco de dados
        $pedido = Pedido::create([
            'USUARIO_ID' => Auth::id(),
            'ENDERECO_ID' => $request->ENDERECO_ID,
            'STATUS_ID' => $request->STATUS_ID,
            'PEDIDO_DATA' => now(),
        ]);

        // Recuperando os itens do carrinho do usuário
        $carrinhoItens = CarrinhoItem::where('USUARIO_ID', Auth::id())->get();

        foreach ($carrinhoItens as $item) {
            \Illuminate\Support\Facades\DB::table('PEDIDO_ITEM')->insert([
                'PRODUTO_ID' => $item->PRODUTO_ID,
                'PEDIDO_ID' => $pedido->PEDIDO_ID,
                'ITEM_QTD' => $item->ITEM_QTD,
                'ITEM_PRECO' => $item->produto->PRODUTO_PRECO, // Supondo que o modelo Produto tem o preço
            ]);
        }

        // Limpar o carrinho do usuário após criar o pedido (opcional)
        CarrinhoItem::where('USUARIO_ID', Auth::id())->delete();

        return redirect()->route('carrinho')->with('success', 'Pedido salvo com sucesso!');
    }
    public function historicoPedidos()
    {
        // Recuperando o histórico de pedidos agrupados pelo PEDIDO_ID
        $historico = \Illuminate\Support\Facades\DB::table('PEDIDO')
            ->join('PEDIDO_ITEM', 'PEDIDO.PEDIDO_ID', '=', 'PEDIDO_ITEM.PEDIDO_ID')
            ->join('PRODUTO', 'PEDIDO_ITEM.PRODUTO_ID', '=', 'PRODUTO.PRODUTO_ID')
            ->select(
                'PEDIDO.PEDIDO_ID',
                'PEDIDO.PEDIDO_DATA',
                'PRODUTO.PRODUTO_NOME',
                'PEDIDO_ITEM.ITEM_QTD',
                'PEDIDO_ITEM.ITEM_PRECO'
            )
            ->where('PEDIDO.USUARIO_ID', Auth::id())
            ->orderBy('PEDIDO.PEDIDO_DATA', 'desc')
            ->get()
            ->groupBy('PEDIDO_ID'); // Agrupando pelo PEDIDO_ID

        return view('pages.historico-pedidos', compact('historico'));
    }
}
