<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class RoomController extends Controller
{
    
    public function index()
    {
        return response([
            'rooms'=>RoomResource::collection(Room::get())
        ]);
    }

    
    public function store(StoreRoomRequest $request)
    {
        Room::create($request->validated());

        return response([
            'message'=>'created'
        ]);
    }

    
    public function show(Room $room)
    {
        return response([
            'message'=>'one room',
            'room'=>RoomResource::make($room)
        ]);
    }

    
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->validated());
        
        return response([
            'message'=>'updated'
        ]);
    }

    
    public function destroy(Room $room)
    {
        $room->delete();

        return response([
            'message'=>'deleted'
        ]);
    }
}
