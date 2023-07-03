<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Resources\BedroomResource;
use App\Http\Resources\FloorResource;
use App\Http\Resources\RoomResource;
use App\Http\Resources\SectionResource;
use App\Models\Bedroom;
use App\Models\Booking;
use App\Models\Floor;
use App\Models\Room;
use App\Models\Section;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function bedrooms()
    {
        return response([
            'bedrooms'=> BedroomResource::collection(Bedroom::get())
        ]);

    }

    public function bedroom(Bedroom $bedroom)
    {
        return  response([
            'message'=>'one bedroom',
            'bedroom'=>BedroomResource::make($bedroom)
        ]);
    }

    public function floors()
    {
        return response([
            'floors'=> FloorResource::collection(Floor::get())
        ]);
    }

    public function floor(Floor $floor)
    {
        return response([
            'message'=>'one floor',
            'floor'=>FloorResource::make($floor)
        ]);
    }

    public function sections()
    {
        return response([
            'sections'=> SectionResource::collection(Section::get())
        ]);
    }

    public function section(Section $section)
    {
        return response([
            'message'=>'one floor',
            'section'=>SectionResource::make($section)
        ]);
    }

    public function rooms()
    {
        return response([
            'rooms'=> RoomResource::collection(Room::get())
        ]);
    }

    public function room(Room $room)
    {
        return response([
            'message'=>'one floor',
            'room'=>RoomResource::make($room)
        ]);
    }

    public function booking(StoreBookingRequest $request)
    {
       
        Booking::create($request->validated());
        
        return response([
            'message'=>'booked'
        ]);
    }
}
