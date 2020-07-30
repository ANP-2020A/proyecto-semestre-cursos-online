<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Preguntas extends JsonResource
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
            'id' => $this->id,
            'Descripción' => $this->descripcion,
            'Valor' => $this->valor,
            'Nivel_id' => "/api/niveles/".$this->nivel_id,
            'created_at' => $this->created_at,
        ];
    }
}
