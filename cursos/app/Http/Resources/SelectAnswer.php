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
            'Selection' => $this->selection,
            'Value' => $this->value,
            'Answer_id' => "/api/answers/".$this->answer_id,
            'Record_id' => "/api/records/".$this->record_id
        ];
    }
}
