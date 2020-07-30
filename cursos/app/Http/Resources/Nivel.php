<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Nivel extends JsonResource
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
            'Titulo' => $this->Titulo,
            'Número' => $this->Numero,
            'Descripcion' => $this->Descripcion,
            'Curso_id' => "/api/cursos/".$this->curso_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
