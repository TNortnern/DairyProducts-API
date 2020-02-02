<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    //what items should be mass fillable, add this with every model
    protected $guarded = [];



    public static function allOrders()
    {
        $all = DB::table('users')
        ->select(
            'users.email', 'users.name',
            'orders.id as order_id', 'orders.created_at', 'orders.user_id', 'orders.status',
            'order_items.product_id', 'order_items.size', 'order_items.quantity',
            'products.image', 'products.name', 'products.is_active'
        )
        ->join('orders', 'orders.user_id', '=', 'users.id')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->get();
        return $all;
    }


    public static function AddOrder($user_id, $items)
    {
        $add = DB::table('orders')->insert([

            'user_id' => $user_id,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $latest = DB::table('orders')->orderBy('id', 'desc')->first()->id;
        foreach ($items as $item) {
            DB::table('order_items')->insert([
                'order_id' => $latest,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'size' => $item['size'],
            ]);
        }
        return response()->json($add);
    }

    public static function deleteOrder($order_id)
    {
        $delete = DB::table('orders')->where('id', '=', $order_id)->delete();
        return $delete;
    }

    //Whole table is made up of foriegn keys
    public static function updateOrder($id, $status)
    {
        $update = DB::table('orders')->where('id', '=', $id)->update(['status' => $status, 'updated_at' => date("Y-m-d H:i:s")]);
        return $update;
    }

    public static function reorder($order_id)
    {
        $reorder = DB::table('orders')->get()->where('id', '=', $order_id);
        return $reorder;
    }

    public static function userOrders($user_id)
    {
        
        $tmp = DB::table('orders')->where('user_id', '=', $user_id)
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->get();

        if (!$tmp) {
            return response()->json('user has no order history.');
        }
        return $tmp;
    }
}
