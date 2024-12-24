<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'PEDIDO_ITEM';

    // Chave primária da tabela
    protected $primaryKey = 'PRODUTO_ID'; // Supondo que o campo seja único por produto no pedido

    // Indica que a tabela não utiliza os campos `created_at` e `updated_at`
    public $timestamps = false;

    // Campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'ITEM_PRECO',
        'PEDIDO_ID',
        'ITEM_QTD',
        'PRODUTO_ID',
    ];

    // Relacionamento com o modelo Pedido
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'PEDIDO_ID', 'PEDIDO_ID');
    }

    // Relacionamento com o modelo Produto
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }
}
