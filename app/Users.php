<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //Grab all user names
    public static function getAllUsers()
    {
        $users = DB::table('users')->get();
        return $users;
    } //end getAllUsers

    public static function createUser($name, $email, $password, $is_authorized, $auth_lvl)
    {
        $create =  DB::table('users')->insert([
            [
                 'name' => $name, 'email' => $email,
                 'password' => Hash::make($password), 
                 'is_authorized'=> $is_authorized, 'auth_lvl'=>$auth_lvl
            ]
        ]);
        $user = DB::table('users')->orderBy('id', 'DESC')->first();
        return response()->json($user);
    }

    public static function updateUser($name, $email, $is_authorized, $auth_lvl, $user_id)
    {
        $exist = DB::table('users')->where('email', $email)->value('email');
        if ($exist) {
            $updates = DB::table('users')->
        where('id', '=', $user_id)->update(['name'=>$name, 'is_authorized'=>$is_authorized, 'auth_lvl'=> $auth_lvl]);
        } else {
            
            $updates = DB::table('users')->
            where('id', '=', $user_id)->update(['name'=>$name, 'email'=>$email, 'is_authorized'=>$is_authorized, 'auth_lvl'=> $auth_lvl]);
        }
        $user = DB::table('users')->where('id', $user_id)->first();
        return response()->json($user);
    }

    public static function deleteUser($user_id)
    {
        //return $user_id;
        return DB::table('users')->where('id', '=', $user_id)->delete();
    }

}//end model
