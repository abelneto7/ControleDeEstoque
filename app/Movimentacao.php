<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacoes';

    protected $fillable = [
      'produto_id',
      'quantidade',
      'tipo_movimentacao',
    ];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
        /*
         * $this: instância atual da classe
         *
         * Quando você está dentro de um método de uma classe,
         * você usa $this para acessar as propriedades e métodos dessa instância específica da classe.
         * */
    }

    public function getTipoMovimentacaoNomeAttribute()
    {
        return $this->tipo_movimentacao == 1 ? 'Entrada' : 'Saída';
    }
}
