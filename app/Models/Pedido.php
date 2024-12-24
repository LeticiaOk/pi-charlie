<?php

// app/Models/Pedido.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID';
    public $timestamps = false;

    protected $fillable = [
        'USUARIO_ID',
        'ENDERECO_ID',
        'STATUS_ID',
        'PEDIDO_DATA',
    ];

    // Relacionamento: Cada Pedido pertence a um PedidoStatus
    public function pedidoStatus()
    {
        return $this->belongsTo(PedidoStatus::class, 'STATUS_ID', 'STATUS_ID');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID', 'USUARIO_ID');
    }

    // Relacionamento: Cada Pedido pertence a um Endereço
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'ENDERECO_ID', 'ENDERECO_ID');
    }
}

