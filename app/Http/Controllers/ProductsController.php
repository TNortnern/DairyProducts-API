<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // call Model function to return all products, make your migrations next
        $products = Products::getAllProducts($request->term);
        return $products;
    }

    public function checkIfSame(Request $request)
    {
        $appProds = $request->products;
        $dbProds = Products::all();
        // $result = array_diff_assoc((array)$appProds, (array)$dbProds);
        // return 'test';
        $diff = array_udiff(
            $appProds,
            $dbProds,
            function ($obj_a, $obj_b) {
                return $obj_a->updated_at - $obj_b->updated_at;
            }
        );
        return response()->json($diff);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');
        //you also need to keep file extension as well
        $id = uniqid();
        $name = $id . $file->getClientOriginalName();
        $path = $file->move(public_path('/uploads'), $name);
        $imagename = "http://trayvonnorthern.com/Edgewood-API/public/uploads/$name";
        // return $imagename;
        $products = Products::addProduct($request->name, $imagename, $request->category, $request->description, $request->size);
        return $products;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->hasFile('photo')) {
            $products = Products::updateProduct($request->name, '', $request->description, $request->id, $request->category, $request->size);
            return $products;
        } else {
            $file = $request->file('photo');
            //you also need to keep file extension as well
            $id = uniqid();
            $name = $id . $file->getClientOriginalName();
            $path = $file->move(public_path('/uploads'), $name);
            $imagename = "http://trayvonnorthern.com/Edgewood-API/public/uploads/$name";

            $products = Products::updateProduct($request->name, $imagename, $request->description, $request->id, $request->category, $request->size);
            return $products;
        }
    }

    public function delete(Request $request)
    {
        $products = Products::deleteProduct($request->id);
        return $products;
    }
}
