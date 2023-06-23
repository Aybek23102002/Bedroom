<?php

namespace App\Http\Resources;

use App\Models\Room;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        $room = Room::find($this->room->id);

        if($room['section_id'])
        {
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'lastname'=>$this->lastname,
                'facultet'=>$this->facultet,
                'group'=>$this->group,
                'bedroom'=>$this->bedroom->number,
                'floor'=>$this->floor->number,
                'section'=>$room['section_id'],
                'room'=>$this->room->number
            ];
        }
        else
        {
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'lastname'=>$this->lastname,
                'facultet'=>$this->facultet,
                'group'=>$this->group,
                'bedroom'=>$this->bedroom->number,
                'floor'=>$this->floor->number,
                'room'=>$this->room->number
            ];
        }

        
    }
}
