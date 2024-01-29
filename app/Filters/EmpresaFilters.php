<?php

namespace App\Filters;

class EmpresaFilters extends Filters
{
    /**
     * List of all avaliable filters.
     *
     * @var array
     */
    protected $filters = [
        'recnum',
        'empresa', 
        'codigo',
        'razao_social', 
        'tipo', 
        'cpf_cnpj'
    ];

    protected function codigo($codigo)
    {
        return $this->builder->where('codigo', $codigo);
    }

    protected function empresa($empresa)
    {
        return $this->builder->where('empresa', '=', $empresa);
    }

    protected function sigla($sigla)
    {
        return $this->builder->where('sigla', 'like', '%' . $sigla . '%');
    }

    protected function razao_social($razao_social)
    {
        return $this->builder->where('razao_social', 'like', '%' . $razao_social . '%');
    }
}