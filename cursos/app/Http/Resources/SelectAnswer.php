<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SelectAnswer extends JsonResource
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
            'Respuest_seleccionada' => $this->avance,
            'Nota' => $this->calificacion,
            'Answer_id' => "/api/answers/".$this->answer_id,
            'Historial_id' => "/api/historial/".$this->historial_id
        ];
    }
}
