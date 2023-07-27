<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\FloorResource;
use App\Http\Resources\UserResource;
use App\Models\User;
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
          'admin'=>UserResource::collection($this->users),
          'number'=>$this->number,
          'floor_count'=>$this->floor_count,
          'room_count'=>$this->room_count,
          'section_status'=>$this->section_status,
          'floors'=> FloorResource::collection($this->floors)
        ];
    }
}
