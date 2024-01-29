<?php

namespace App\Filters;

class ClienteFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'recnum', 
        'codigo', 
        'empresa', 
        'sigla', 
        'valor_final', 
    ];
    
    protected function empresa($empresa)
    {
        return $this->builder->where('empresa', '=', $empresa);
    }

    protected function codigo($codigo)
    {
        return $this->builder->where('codigo', $codigo);
    }

    protected function razao_social($razao_social)
    {
        return $this->builder->where('razao_social', 'like', '%' . $razao_social . '%');
    }

    protected function tipo($tipo)
    {
        return $this->builder->where('tipo', 'like', '%' . $tipo . '%');
    }

    protected function cpf_cnpj($cpf_cnpj)
    {
        return $this->builder->where('cpf_cnpj', $cpf_cnpj );
    }
}