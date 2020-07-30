<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Registro extends JsonResource
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
            'Avance' => $this->avance,
            'Calificación' => $this->calificacion,
            'Curso_id' => "/api/cursos/".$this->curso_id,
            'User_id' => "/api/users/".$this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
