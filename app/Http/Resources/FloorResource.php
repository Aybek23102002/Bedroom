<?php

namespace App\Http\Resources;

use App\Models\Section;
use Illuminate\Http\Resources\Json\JsonResource;

class FloorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id'=>$this->id,
            'number'=>$this->number,
            'bedroom'=>$this->bedroom->number,
            'sections'=>SectionResource::collection($this->sections),
            'rooms'=>RoomResource::collection($this->rooms)
        ];
    }
}
