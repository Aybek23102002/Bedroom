<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBedroomRequest;
use App\Http\Requests\UpdateBedroomRequest;
use App\Http\Resources\Admin\BedroomResource as AdminBedroomResource;
use App\Http\Resources\BedroomResource;
use App\Models\Bedroom;
use Illuminate\Http\Request;

class BedroomController extends Controller
{
    
    public function index()
    {
        return response([
            'bedrooms'=>AdminBedroomResource::collection(Bedroom::with('users')->get())
        ]);
    }

   
    public function store(StoreBedroomRequest $request)
    {
        Bedroom::create($request->validated());

        return response([
            'message'=>'created'
        ]);
    }

   
    public function show($id)
    {
        return response([
            'message'=>'one bedroom',
            'bedroom'=>AdminBedroomResource::make(Bedroom::find($id))
        ]);
    }

    
    public function update(UpdateBedroomRequest $request, $id)
    {
        Bedroom::find($id)->update($request->validated());

        return response([
            'message'=>'updated'
        ]);
    }

   
    public function destroy($id)
    {
        Bedroom::find($id)->delete();

        return response([
            'message'=>'deleted'
        ]);
    }
}
