<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Return all users
        //return User::all();
        return UserResource::collection(User::all());
    }

    public function store(UserRequest $request)
    {
        // Validate request data

        User::create($request->all());
        return response()->json("user has been created suuccessfuly", 201);
    }
    public function show (string $id)
    {
        $user= User::find($id);
        if(! $user)
        {
            return response()->json(
                [
                    "message "=>"user not found",
                ],
                404
            );
        }
        return response()->json(
            [
                "message "=>"the deatiels is",
              new UserResource($user),
            ],
            200
        );

    }
    public function update(UserRequest $request,string $id)
    {
        $user= User::find($id);
        if(! $user)
        {
            return response()->json(
                [
                    "message "=>"user not found",
                ],
                404
            );
        }
        $user->update($request->all());
        return response()->json(
            [
                "message "=>"the deatiels is",
                new UserResource($user),
            ],
            200
        );

    }

public function destroy(string $id)
{
    $user= User::find($id);
    if(! $user)
    {
        return response()->json(
            [
                "message "=>"user not found",
            ],
            404
        );
    }
    $user->delete();
    return response()->json(
        [
            "message"=>"The user has been deleted"
        ]
        );
}
}
