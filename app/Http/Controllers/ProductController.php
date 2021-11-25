<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        if (empty($products)){
            return response()->json(['message'=>'No Data Found'], 404);
        }else{
            return response()->json(['products'=>$products], 200);
        }
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:191',
            'details' => 'required|max:191',
            'price' => 'required',
            'qty' => 'required',
            'unit' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->unit = $request->unit;
        $product->save();

        return response()->json(['message'=>'Product Created Successfully'], 200);
    }

    public function show($id){
        $product = Product::find($id);
        if (empty($product)){
            return response()->json(['message'=>'Product Not Found'], 404);
        }else{
            return response()->json(['product'=>$product], 200);
        }
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:191',
            'details' => 'required|max:191',
            'price' => 'required',
            'qty' => 'required',
            'unit' => 'required',
        ]);


        $product = Product::find($id);
        if(!empty($product)){
            $product->name = $request->name;
            $product->details = $request->details;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->unit = $request->unit;
            $product->update();

            return response()->json(['message'=>'Product Updated Successfully'], 200);
        }else{
            return response()->json(['message'=>'Product Not Found'], 404);
        }
    }

    public function destroy($id){
        $product = Product::find($id);
        if (empty($product)){
            return response()->json(['message'=>'Product Not Found'], 404);
        }else{
            $product->delete();
            return response()->json(['message'=>'Product Delete Successfully'], 200);
        }
    }
}
