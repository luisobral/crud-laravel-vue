<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'recnum' => $this->recnum,
            'codigo' => $this->codigo,
            'empresa' => $this->empresa,
            'sigla' => $this->sigla, 
            'razao_social' => $this->razao_social
        ];
    }
}
