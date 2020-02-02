<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
     //what items should be mass fillable, add this with every model
     protected $guarded = [];

     public static function getAllProducts()
     {
         //return test
         $products = DB::table('users')
             ->join('orders', 'orders.user_id', '=', 'users.id')
             ->join('products', 'products.id', '=', 'orders.id')
             ->get();
         return $products;
     }
 
     public static function allOrders()
     {
         $all = DB::table('order_items')->get();
         return $all;
     }
 
     //Whole table is made up of Foriegn keys
     public static function AddOrder()
     {
 
         $add = DB::table('order_items')->insert([
         ]);
         return $add;
     }
 
     public static function deleteOrder($id)
     {
         $delete = DB::table('order_items')->where('id', '=', $id)->delete();
         return $delete;
     }
 
     //Whole table is made up of foriegn keys
     public static function updateOrder()
     {
         $update = DB::table('order_items')->update([
         ]);
         return $update;
     }
}
