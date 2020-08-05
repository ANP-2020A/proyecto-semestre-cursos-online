<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
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
            'Value' => $this->value,
            'Level_id' => "/api/levels/".$this->level_id,
            'created_at' => $this->created_at,
        ];
    }
}
