<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFloorRequest;
use App\Http\Requests\UpdateFloorRequest;
use App\Http\Resources\FloorResource;
use App\Models\Floor;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class FloorController extends Controller
{
   
    public function index()
    {
        return response([
            'floors'=>FloorResource::collection(Floor::get())
        ]);
    }

   
    public function store(StoreFloorRequest $request)
    {
        Floor::create($request->validated());

        return response([
            'message'=>'created'
        ]);
    }

    
    public function show($id)
    {
        return response([
            'message'=>'one floor',
            'floor'=>FloorResource::make(Floor::find($id))
        ]);
    }

    
    public function update(UpdateFloorRequest $request, $id)
    {
        Floor::find($id)->update($request->validated());

        return response([
            'message'=>'updated'
        ]);
    }

    
    public function destroy(Floor $floor)
    {
        $floor->delete();

        return response([
            'message'=>'deleted'
        ]);
    }
}
