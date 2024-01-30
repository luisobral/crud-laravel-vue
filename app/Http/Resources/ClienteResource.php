<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
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
            'empresa' => $this->empresa,
            'codigo' => $this->codigo,
            'razao_social' => $this->razao_social,
            'tipo' => $this->tipo,
            'cpf_cnpj' => $this->cpf_cnpj, 
            'path' => $this->path, 
        ];
    }
}
