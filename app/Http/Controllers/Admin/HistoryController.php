<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHistoryRequest;
use App\Http\Resources\HistoryResource;
use App\Models\Booking;
use App\Models\History;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HistoryController extends Controller
{
    
    public function index()
    {
        return response([
            'histories'=>HistoryResource::collection(History::get())
        ]);
    }

    public function create($id)
    {
        $booking = Booking::find($id);

        $room = Room::find($booking['room_id']);
        Room::where('id',$booking->room_id,)->update(['place_count'=>$room['place_count']-1]);

        History::create([
            'name'=>$booking['name'],
            'lastname'=>$booking['lastname'],
            'facultet'=>$booking['facultet'],
            'group'=>$booking['group'],
            'phone'=>$booking['phone'],
            'bedroom_id'=>$booking['bedroom_id'],
            'floor_id'=>$booking['floor_id'],
            'room_id'=>$booking['room_id'],
            'given_time'=>$booking['given_time'],
            'return_time'=>$booking['return_time']
        ]);

        $booking->delete();
        
        return response([
            'message'=>'created'
        ]);
    }

    public function store(Request $request)
    {
        
    }

    
    public function show(History $history)
    {
        return response([
            'history'=>HistoryResource::make($history)
        ]);
    }

    
    public function update(Request $request, History $history)
    {
        if($history['room_id'] == $request->room_id)
        {
            $history->update($request->validated());
            return response([
                'message'=>'updated'
            ]);
        }
        else
        {   
            $room_last = Room::find($history['room_id']); 
            $room = Room::find($request->room_id);
            Room::Where('id',$history['room_id'])->update(['place_count'=>$room_last['place_count']+1]);
            Room::Where('id',$request->room_id)->update(['place_count'=>$room['place_count']-1]);
            $history->update($request->validated());

            return response([
                'message'=>'updated'
            ]);
        }

        

       
    
    }

    
    public function destroy(History $history)
    {
        $room = Room::find($history['room_id']);   
        Room::where('id',$history['room_id'])->update(['place_count'=>$room['place_count']+1]);
        $history->delete();

        return response([
            'message'=>'deleted'
        ]);
    }
}
