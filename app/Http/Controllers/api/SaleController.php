<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('customer:intCustomerID,txtCustomerName', 'product:intProductID,txtProductName')->get();

        return new SaleResource(true, 'List of All Sales', $sales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|integer',
            'product_id' => 'required|integer',
            'buyed_at' => 'required|date',
            'qty' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $sale = Sale::create([
            'intCustomerID' => $request->customer_id,
            'intProductID'  => $request->product_id,
            'dtSalesOrder'  => $request->buyed_at,
            'intQty'        => $request->qty,
        ]);

        return new SaleResource(true, 'Sale Details', $sale);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::with('product:intProductID,txtProductCode,txtProductName', 'customer:intCustomerID,txtCustomerName,txtCustomerAddress,bitGender')->find($id);

        return new SaleResource(true, 'Sale Details', $sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|integer',
            'product_id' => 'required|integer',
            'buyed_at' => 'required|date',
            'qty' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Find Sale
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json([
                'status' => "Error",
                'message' => 'Product not found'
            ], 422);
        }

        // Update Sale
        $sale->update([
            'intCustomerID' => $request->customer_id,
            'intProductID'  => $request->product_id,
            'dtSalesOrder'  => $request->buyed_at,
            'intQty'        => $request->qty,
        ]);

        return new SaleResource(true, 'Sale successfully updated!', $sale);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale = Sale::find($id);

        if (!$sale) {
            return response()->json([
                'status' => "Error",
                'message' => 'Product not found'
            ], 422);
        }

        $sale->delete();

        return new SaleResource(true, 'Sale successfully deleted !', $sale);
    }
}
