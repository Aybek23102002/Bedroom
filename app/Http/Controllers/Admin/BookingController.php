<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'booking'=>BookingResource::collection(Booking::get())
        ]);
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(Booking $booking)
    {
        return response([
            'booking'=>BookingResource::make($booking)
        ]);
    }

    
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        if($booking['room_id'] == $request->room_id)
        {
            $booking->update($request->validated());
            return response([
                'message'=>'updated'
            ]);
        }
        else
        {   
            $room_last = Room::find($booking['room_id']); 
            $room = Room::find($request->room_id);
            Room::Where('id',$booking['room_id'])->update(['place_count'=>$room_last['place_count']+1]);
            Room::Where('id',$request->room_id)->update(['place_count'=>$room['place_count']-1]);
            $booking->update($request->validated());
            return response([
                'message'=>'updated'
            ]);
        }

        

       
    }

    
    public function destroy(Booking $booking)   
    {
        $room = Room::find($booking['room_id']);   
        Room::where('id',$booking['room_id'])->update(['place_count'=>$room['place_count']+1]);
        $booking->delete();

        return response([
            'message'=>'deleted'
        ]);
    }
}
