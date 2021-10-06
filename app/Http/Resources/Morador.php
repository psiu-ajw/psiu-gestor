<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Morador extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'estado_civil' => $this->estado_civil,
            'raca' => $this->raca,
            'bairro_comunidade' => $this->bairro_comunidade,
          ];
    }
}
