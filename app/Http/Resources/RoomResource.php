<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->section_id)
        {
            return [
                'id'=>$this->id,
                'number'=>$this->number,
                'place_count'=>$this->place_count,
                'bedroom'=>$this->bedroom->number,
                'floor'=>$this->floor->number,
                'section'=>$this->section->number,
                'status'=>$this->status
            ];
        }
        else
        {
            return [
                'id'=>$this->id,
                'number'=>$this->number,
                'place_count'=>$this->place_count,
                'bedroom'=>$this->bedroom->number,
                'floor'=>$this->floor->number,
                'status'=>$this->status
                
            ];
        }

        
    }
}
