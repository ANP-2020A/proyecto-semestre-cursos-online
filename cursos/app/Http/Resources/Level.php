<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Level extends JsonResource
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
            'Title' => $this->title,
            'Number' => $this->number,
            'Description' => $this->description,
            'Course_id' => "/api/courses/".$this->course_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
