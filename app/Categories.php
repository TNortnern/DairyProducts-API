<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public static function getAllCategories()
    {
         $categories = DB::table('categories')
        ->where('is_active', 1)
        ->get();
        return response()->json($categories);
    }

    public static function createCat($name, $desc, $image)
    {   
        $create = DB::table('categories')->insert([
            'catname' => $name, 'catdescription' => $desc, 'catimage' => $image
        ]);
        $cat = DB::table('categories')->orderBy('id', 'DESC')->first();
        return $cat;
    }

    public static function updateCat($id, $desc, $newname)
    {
        $updates = DB::table('categories')->where('id', '=', $id)->update([
            'catname' => $newname, 'catdescription' => $desc
        ]);
        $cat = DB::table('categories')->where('id', '=', $id)->first();
        return response()->json($cat);
    }

    public static function deleteCat($product_id)
    {
        $deletes = DB::table('categories')->where('id', '=', $product_id)->delete();
        return $deletes;
    }
}
