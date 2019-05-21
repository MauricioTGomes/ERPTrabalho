<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'apelido_produto',
        'qtd_estoque',
        'valor_compra',
        'valor_venda',
        'codigo',
        'cod_barras',
        'ativo'
    ];


    public function setValorVendaAttribute($value) {
        return $this->attributes['valor_venda'] = formatValueForMysql($value);
    }

    public function setValorCompraAttribute($value) {
        return $this->attributes['valor_compra'] = formatValueForMysql($value);
    }
}
