<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UsreStoreRequest;
use App\Models\User;
use Date;
use Hash;
use Illuminate\Support\Facades\DB;

class UserController
{
    //Create
    public static function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile = "https://cacaocare.s3.ap-southeast-2.amazonaws.com/profile-photos/default_profile.png";
        $user->region = $request->region;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->barangay = $request->barangay;
        $user->role = 'user';

        $user->save();

        return response()->noContent();
    }

    // public function upload(Request $request){
    //     $path = $request->file('file')->storePubliclyAs('cacao-photos/blackpod-rot');
    //     return response()->json([
    //         'data' => $path
    //     ]);
    // }

    //Retreive

    public function getMany()
    {
        $user = User::where("role", "user")->get();
        return response()->json([
            'data' => $user
        ], 200);
    }

    public function getOne(string $uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        if(!$user){
            return response()->json([], 404);
        }else{
            return response()->json([
                'data' => $user
            ], 200);
        }
    }

    public function getCurrentUser()
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $token = $user->currentAccessToken();

        if (!$token) {
            return response()->json(['message' => 'Token not found'], 401);
        }
        if ($token->expired_at && $token->expired_at->isPast()) {
            $token->delete();
            return response()->json(['message' => 'Token expired, please login again'], 401);
        }

        return response()->json([
            'data' => $token
        ], 200);
    }


    public function getUserCount(){
        $count = User::where('role', 'user')->count();
        return response()->json([
            'data'=>$count
        ]
        ,200);
    }

    public function getUserSignToday(){
        $count = User::where('role', 'user')->whereDate('created_at', now()->toDateString())->count();
        return response()->json([
            'data'=>$count
        ], 200);
    }
    //Update
    public function update(UserUpdateRequest $request, User $user)
    {

    }

    //Delete
    public function destroy(User $user)
    {
        //
    }
}
