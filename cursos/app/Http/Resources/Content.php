<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Content extends JsonResource
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
            'Level_id' => "/api/levels/".$this->level_id,
        ];
    }
}
