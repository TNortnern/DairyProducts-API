<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // call Model function to return all products, make your migrations next
        $products = Orders::allOrders();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Orders::AddOrder($request->user_id, $request->cartItems);
        return $store;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = Orders::updateOrder($request->order_id, $request->status);
        return $update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */



    public function destroy(Request $request)

    {
        $delete = Orders::deleteOrder($request->id);
        return $delete;
    }

    public function getUserOrders(Request $request)
    {
        $orders = Orders::userOrders($request->id);
        return $orders;
    }
}
