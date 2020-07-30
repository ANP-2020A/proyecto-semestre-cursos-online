<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Answer extends JsonResource
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
            'Descripción' => $this->Descrip_Resp,
            'Respuesta_correcta' => $this->Correct_Resp,
            'Registro_id' => "/api/preguntas/".$this->pregunta_id,
        ];
    }
}
