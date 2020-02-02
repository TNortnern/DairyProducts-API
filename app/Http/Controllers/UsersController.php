<?php

namespace App\Http\Controllers;

use App\Users;
use PhpParser\Node\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::getAllUsers();
        return $users;
    }

    public function refreshToken() 
    {
        try {

            $newToken = auth('api')->refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }

        return response()->json(['token' => $newToken]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'user not found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => 'token expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'token invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => 'token absent'], $e->getStatusCode());
        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Users::CreateUser($request->name, $request->email, $request->password, $request->is_authorized, $request->auth_lvl);
        return $store;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    //Update User
    public function updateUser(Request $request)
    {
        $updates = Users::updateUser($request->name, $request->email, $request->is_authorized, $request->auth_lvl, $request->id);
        return $updates;
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $delete = Users::deleteUser($request->id);
        return $delete;
    }

    public function promptAuth(Request $request)
    {
        $passcode = DB::table('passcodes')->where('is_active', 1)->value('passcode');

        if ($request->passcode == $passcode) {
            $user = DB::table('users')->where('email', $request->email)->update(['is_authorized' => 1]);
            return $user;
        } else {
            return response()->json('Incorrect passcode.', 200);
        }
    }
}
