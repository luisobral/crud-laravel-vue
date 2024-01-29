<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFactory;
use App\Traits\HasFilters;

class Empresa extends Model
{
    use HasFactory, HasFilters;
    /**
     * Define os campos associados 
     * ao recurso que podem ser 
     * preenchidos, evitando ataques 
     * do tipo Mass Assingment.
     * 
     * @var array
     */
    protected $fillable = [
        'recnum',
        'codigo', 
        'empresa', 
        'sigla', 
        'razao_social'
    ];

    /**
     * Define atributos que 
     * deverão ser mesclados 
     * com o recurso.
     * 
     * @var array
     */
    protected $appends = [
        'path',
    ];

    /**
     * Definindo um accessor para o 
     * atributo path, responsável por 
     * retornar o caminho do recurso.
     * 
     * @return string
     */
    public function getPathAttribute()
    {
        return '/empresa/' . $this->id;
    }
}
