<?php

namespace App\Http\Controllers;

use App\order_items;
use Illuminate\Http\Request;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order_items::getAllProducts();
        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = order_items::InsertOrdered($request);
        return $store;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\order_items  $order_items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order_items $order_items)
    {
        $update = order_items::updateOrder($request);
        return $update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\order_items  $order_items
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $delete = Orders::deleteOrder($order_id);
        return $delete;
    }
}
