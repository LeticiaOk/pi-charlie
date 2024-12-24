<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoEstoque extends Model
{
    use HasFactory;

    protected $table = 'PRODUTO_ESTOQUE';
    public $timestamps = false;

    protected $fillable = ['PRODUTO_ID', 'PRODUTO_QTD'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID', 'PRODUTO_ID');
    }
}
