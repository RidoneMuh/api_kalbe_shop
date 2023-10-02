<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return new ProductResource(true, 'List of All Products', $products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_code' => 'required',
            'product_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::create([
            'txtProductCode' => $request->product_code,
            'txtProductName' => $request->product_name,
            'intQty'         => $request->qty,
            'decPrice'       => $request->price,
        ]);

        return new ProductResource(true, 'Add Product Success !', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::where('intProductID', $id)->first();

        if (!$product) {
            return response()->json([
                'status' => "Error",
                'message' => 'Product not found'
            ], 422);
        }
        return new ProductResource(true, 'Product Details', $product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_code' => 'required',
            'product_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // Find Product
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => "Error",
                'message' => 'Product not found'
            ], 422);
        }
        $product->update([
            'txtProductCode' => $request->product_code,
            'txtProductName' => $request->product_name,
            'intQty'         => $request->qty,
            'decPrice'       => $request->price,
        ]);

        return new ProductResource(true, 'Update product succeed!', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => "Error",
                'message' => 'Product not found'
            ], 422);
        }

        $product->delete();

        return new ProductResource(true, 'Product successfully deleted !', $product);
    }
}
