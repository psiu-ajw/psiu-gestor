<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Projeto extends JsonResource
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
            'nome_projeto' => $this->nome_projeto,
            'area_projeto' => $this->area_projeto,
            'pontuacao' => $this->pontuacao,
            'financiador' => $this->financiador,
            'status' => $this->status,
          ];


    }
}
