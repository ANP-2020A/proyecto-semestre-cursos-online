<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Record extends JsonResource
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
            'Date_Record' => $this->date_record,
            'Score' => $this->score,
            'Comment' => $this->comment,
            'Level_id' =>"/api/levels/".$this->level_id,
            'Register_id' => "/api/registers/".$this->register_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
