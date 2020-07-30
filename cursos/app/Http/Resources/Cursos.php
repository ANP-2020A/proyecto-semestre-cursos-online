<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cursos extends JsonResource
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
            'Nombre' => $this->Nombre,
            'Descripción' => $this->Descripcion,
            'Tipo' => $this->Tipo,
            'Fecha_de_inicio' => $this->FechaInicio,
            'Niveles' => $this->Niveles,
            'User_id' => "/api/users/".$this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
