<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

// generate a model, controller, factory, and migration by using
// php artisan make:model Products -m -r -f

class Products extends Model
{
    //what items should be mass fillable, add this with every model
    protected $guarded = [];


    public static function getAllProducts($term)
    {
        if ($term) {
            $products = DB::table('sizes')
            ->join('products', 'sizes.id', '=', 'products.sizes')
            ->join('categories', 'products.category', '=', 'categories.id')
            ->select('products.*', 'categories.catname', 'categories.catimage', 'categories.catdescription', 'sizes.size')
            ->where([
                ['products.is_active', '=', 1],
                ['categories.is_active', '=', 1],
                ['products.name', 'like', '%'. $term . '%']
            ])
            ->orderBy('products.id', 'ASC')
            ->paginate(10);
        } else {
            $products = DB::table('sizes')
                ->join('products', 'sizes.id', '=', 'products.sizes')
                ->join('categories', 'products.category', '=', 'categories.id')
                ->select('products.*', 'categories.catname', 'categories.catimage', 'categories.catdescription', 'sizes.size')
                ->where([
                    ['products.is_active', '=', 1],
                    ['categories.is_active', '=', 1],
                ])
                ->orderBy('products.id', 'ASC')
                ->paginate(10);
        }
        return $products;
    }


    public static function addProduct($name, $image, $category, $desc, $size, $price)
    {
        $products = DB::table('products')->insert([
            'name' => $name,
            'category' => $category,
            'image' => $image,
            'description' => $desc,
            'price' => $price,
            'sizes' => $size
        ]);
        $newProduct = DB::table('sizes')
            ->join('products', 'sizes.id', '=', 'products.sizes')
            ->join('categories', 'products.category', '=', 'categories.id')
            ->select('products.*', 'categories.catname', 'sizes.size')
            ->orderBy('id', 'DESC')->first();
        return response()->json($newProduct, 200);
    }

    public static function deleteProduct($product_id)
    {
        $products =  DB::table('products')->where('id', '=', $product_id)->delete();
        return $products;
    }

    public static function updateProduct($name, $image, $desc, $id, $category, $size, $price)
    {
        if (empty($image)) {
            $updates = DB::table('products')->where('id', $id)->update([
            'name' => $name, 'description' => $desc,
            'category' => $category, 'sizes' => $size, 'price' => $price]);
            return response()->json($updates);
        }
        $updates = DB::table('products')->where('id', $id)->update([
            'name' => $name, 'image' => $image,
            'description' => $desc, 'category' => $category, 'price' => $price, 'sizes' => $size
        ]);
        $updatedProduct = DB::table('sizes')
        ->where('products.id', $id)
        ->join('products', 'sizes.id', '=', 'products.sizes')
        ->join('categories', 'products.category', '=', 'categories.id')
            ->select('products.*', 'categories.catname', 'sizes.size')->first();
        return response()->json($updatedProduct);
    }
}
