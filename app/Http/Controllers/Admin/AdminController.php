<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bedroom;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(Request $request)
    {
        $bedroom = Bedroom::find($request->bedroom_id);
        
        $bedroom->users()->attach($request->user_id);

        $user = User::find($request->user_id);
       
        return response([
            'message'=>'created'
        ]);
    }

    public function delete(Request $request)
    {
        $bedroom = Bedroom::find($request->bedroom_id);
        
        $bedroom->users()->detach($request->user_id);

        return response([
            'message'=>'deleted'
        ]);
    }
}
