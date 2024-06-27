<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];
    public function produtos()
    {
        //return $this->belongsToMany('App\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');

        /*
         * 1 - modelo do relacionamento nxn em relação o modelo que estamos implementando
         * 2 - tabela auxiliar que armazena os registros de relacionamento
         * 3 - representa o nome da fk mapeada pelo modelo na tabela de relacionamento,
         * 4 - representa o nome da fk da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
         */
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

}
