<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoImagem extends Model
{
    use HasFactory;

    protected $table = 'PRODUTO_IMAGEM';
    protected $primaryKey = 'IMAGEM_ID';
    public $timestamps = false;

    protected $fillable = ['PRODUTO_ID', 'IMAGEM_URL'];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'PRODUTO_ID','PRODUTO_ID');
    }
}
