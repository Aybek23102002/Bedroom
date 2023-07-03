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
        
        

       
    }

    
    public function destroy(Booking $booking)   
    {
        
    }
}
