<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Size extends Model
{
    //retreives a list of column values
    public static function allSizes()
    {
        $all = DB::table('sizes')->get();

       return $all;
    }//end allSizes

    public static function createSize($size)
    {
        $create = DB::table('sizes')->insert(['size' => $size]);
        $newest = DB::table('sizes')->orderBy('id', 'DESC')->first();
        return response()->json($newest);
    }//end createSize

    public static function updateSize($id, $size)
    {
        $update = DB::table('sizes')->where('id', '=', $id)->update([
            'size' => $size
        ]);
        $returner = DB::table('sizes')->where('id', '=', $id)->first();
        return response()->json($returner);
    }//end updateSize

    public static function deleteSize($id)
    {
        $delete = DB::table('sizes')->where('id', '=', $id)->delete();
        return $delete;
    }
}

