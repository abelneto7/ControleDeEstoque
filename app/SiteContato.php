<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//SiteContato
//Site_Contato
//site_contatos

class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
