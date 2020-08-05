<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Register extends JsonResource
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
            'Progress' => $this->progress,
            'Score' => $this->score,
            'Course_id' => "/api/courses/".$this->course_id,
            'User_id' => "/api/users/".$this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
