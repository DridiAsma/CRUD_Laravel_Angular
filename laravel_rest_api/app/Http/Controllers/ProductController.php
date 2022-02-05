<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductControllers;
class ProductController extends Controller
{
    //function liste (get all)

    public function getProduct(){
        return response()->json(Product::all(),200);
    }

    //getById

    public function getProductByuId($id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Produit introuvable'],404);
        }
        return response()->json(Product::find($id),200);
    }
//addproduct
    public function addProduct(Request $request){
        $product = Product::create($request->all());

        return response($product,200);
    }

    public function updateProduct(Request $request, $id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Produit introuvable'],404);
        }
        $product->update($request->all());
        return response($product,200);
    }

    public function deleteProduct(Request $request, $id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Produit introuvable'],404);
        }
        $product->delete();
        return response(null,204);
    }
}
