<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';

    protected $fillable = [
        'nome',
        'razao_social',
        'fantasia',
        'cpf',
        'rg',
        'cnpj',
        'ie',
        'fone',
        'email',
        'endereco',
        'cep',
        'endereco_nro',
        'bairro',
        'complemento',
        'sexo',
        'cliente',
        'tipo',
        'fornecedor',
        'cidade_id',
    ];

    public function cidade () {
        return $this->hasOne(Cidade::class, 'cidade_id');
    }

    public function nomeCompleto() {
        if ($this->nome == '') {
            return $this->razao_social . ' - ' . $this->fantasia;
        }
        return $this->nome;
    }

    public function cpfCnpj() {
        if ($this->cpf == '') {
            return $this->cnpj;
        }
        return $this->cpf;
    }
}
