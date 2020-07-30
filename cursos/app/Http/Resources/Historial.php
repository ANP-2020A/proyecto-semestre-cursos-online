<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Historial extends JsonResource
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
            'Nombre' => $this->FechaHistorial,
            'Descripción' => $this->Calificacion,
            'Tipo' => $this->Comentario,
            'Niveles' =>"/api/niveles/".$this->nivel_id,
            'User_id' => "/api/registros/".$this->registro_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
