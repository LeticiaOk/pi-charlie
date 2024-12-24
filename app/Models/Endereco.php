<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'ENDERECO';
    protected $primaryKey = 'ENDERECO_ID';
    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'ENDERECO_NOME',
        'ENDERECO_LOGRADOURO',
        'ENDERECO_NUMERO',
        'ENDERECO_COMPLEMENTO',
        'ENDERECO_CEP',
        'ENDERECO_CIDADE',
        'ENDERECO_ESTADO',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID', 'USUARIO_ID');
    }

     // Relacionamento: Um Endereco pode ter muitos Pedidos
     public function pedidos()
     {
         return $this->hasMany(Pedido::class, 'ENDERECO_ID', 'ENDERECO_ID');
     }
}
