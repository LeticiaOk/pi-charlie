<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use Illuminate\Support\Facades\Auth;

class EnderecoController extends Controller
{
    public function form()
    {
        return view('pages.endereco'); // Certifique-se de que esta view está no local correto.
    }

    public function salvar(Request $request)
    {
        $usuarioId = Auth::id(); // Obtém o ID do usuário autenticado

        // Validação dos dados do formulário
        $request->validate([
            'ENDERECO_NOME' => 'required|string|max:255',
            'ENDERECO_LOGRADOURO' => 'required|string|max:255',
            'ENDERECO_NUMERO' => 'required|integer',
            'ENDERECO_COMPLEMENTO' => 'nullable|string|max:255',
            'ENDERECO_CEP' => 'required|string|max:10',
            'ENDERECO_CIDADE' => 'required|string|max:255',
            'ENDERECO_ESTADO' => 'required|string|max:255',
        ]);

        // Salvar endereço no banco de dados
        Endereco::create([
            'USUARIO_ID' => $usuarioId,
            'ENDERECO_NOME' => $request->ENDERECO_NOME,
            'ENDERECO_LOGRADOURO' => $request->ENDERECO_LOGRADOURO,
            'ENDERECO_NUMERO' => $request->ENDERECO_NUMERO,
            'ENDERECO_COMPLEMENTO' => $request->ENDERECO_COMPLEMENTO,
            'ENDERECO_CEP' => $request->ENDERECO_CEP,
            'ENDERECO_CIDADE' => $request->ENDERECO_CIDADE,
            'ENDERECO_ESTADO' => $request->ENDERECO_ESTADO,
        ]);

         // Redireciona para a página de status
        return redirect()->route('pedido.form')->with('success', 'Endereço salvo com sucesso!');
    }
}
