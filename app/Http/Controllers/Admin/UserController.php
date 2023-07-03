<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        return response([
            'users'=>UserResource::collection(User::get())
        ]);
    }

    
    public function store(StoreUserRequest $request)
    {
        $request->validated();
        User::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'birthday'=>$request->birthday,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password)
        ]);

        return response([
            'message'=>'created'
        ]);
    }

    
    public function show($id)
    {
        $user = User::find($id);
        return response([
            'message'=>'one user',
            'user'=>UserResource::make($user)
        ]);
    }

    
    public function update(UpdateUserRequest $request, $id)
    {
        $result=$request->validated();
        $result['password']=Hash::make($request->password);
        User::find($id)->update($result);

        return response([
            'message'=>'updated'
        ]);
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();

        return response([
            'message'=>'deleted'
        ]);
    }

    public function login(Request $request)
    {

        $fields = $request->validate([
            'phone'=>'required|string|:users,phone',
            'password'=>'required|string'
        ]);

        $user = User::where('phone',$fields['phone'])->first();

        if($user && Hash::check($fields['password'], $user->password))
        {
            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = response([
                'message'=>200,
                'student'=>$user,
                'token'=>$token
            ]);
        }
        else{
            $response = response([
                'message'=>'Incorrect email or password'
            ],401);
        }

        return $response;
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'token oshirildi'
        ]);
    }
}
