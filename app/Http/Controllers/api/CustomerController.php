<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);

        return new CustomerResource(true, 'List of All Customers', $customers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
            'customer_gender' => 'required|boolean',
            'customer_birthdate' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $customer = Customer::create([
            'txtCustomerName' => $request->customer_name,
            'txtCustomerAddress' => $request->customer_address,
            'bitGender'         => $request->customer_gender,
            'dtmBirthDate'       => $request->customer_birthdate,
        ]);

        return new CustomerResource(true, 'Add Customer Success !', $customer);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer = Customer::where('intCustomerID', $id)->first();

        if (!$customer) {
            return response()->json([
                'status' => "Error",
                'message' => 'Cutomer not found'
            ], 422);
        }
        return new CustomerResource(true, 'Cutomer Details', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string',
            'customer_address' => 'required|string',
            'customer_gender' => 'required|boolean',
            'customer_birthdate' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // Find Product
        $customer = Customer::find($id);
        if (!$customer) {
            return response()->json([
                'status' => "Error",
                'message' => 'Customer not found'
            ], 422);
        }
        $customer->update([
            'txtCustomerName' => $request->customer_name,
            'txtCustomerAddress' => $request->customer_address,
            'bitGender'         => $request->customer_gender,
            'dtmBirthDate'       => $request->customer_birthdate,
        ]);

        return new CustomerResource(true, 'Customer Updated Successfully!', $customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'status' => "Error",
                'message' => 'Customer not found'
            ], 422);
        }

        $customer->delete();

        return new CustomerResource(true, 'Customer successfully deleted !', $customer);
    }
}
