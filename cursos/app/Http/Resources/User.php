<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'Name' => $this->name,
            'Last_name' => $this->last_name,
            'Type' => $this->typo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
