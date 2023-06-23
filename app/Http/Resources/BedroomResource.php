<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BedroomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
          'id'=>$this->id,
          'number'=>$this->number,
          'floor_count'=>$this->floor_count,
          'room_count'=>$this->room_count,
          'section_status'=>$this->section_status,
          'floors'=> FloorResource::collection($this->floors)
        ];
    }
}
