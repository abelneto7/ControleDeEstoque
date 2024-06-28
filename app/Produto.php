<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\ProdutoDetalhe;

class Produto extends Model
{
    protected $fillable =['nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedor_id'
    ];

    public function produtoDetalhe()
    {
        return $this->hasOne('App\ProdutoDetalhe', 'produto_id');
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }
}
