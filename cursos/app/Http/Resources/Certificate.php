<?php

namespace App\Http\Resources;

use App\Registro;
use Illuminate\Http\Resources\Json\JsonResource;

class Certificate extends JsonResource
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
            'Description' => $this->description,
            'Register_id' => "/api/registers/".$this->register_id,
            ];
    }

}
