<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::latest()->get(), 200);
    }

    public function store(Request $request)
    {
        return $this->validateFields($request) ?? response()->json(Customer::create($request->all(), 201));
    }

    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }

    public function update(Request $request, Customer $customer)
    {
        return $this->validateFields($request) ?? response()->json([
            "updated" => $customer->update($request->all()), 
            "customer" => $customer
        ], 200);
    }

    public function destroy(Customer $customer)
    {
        return response()->json($customer->delete(), 204);
    }

    private function validateFields(Request $request) 
    {
        $customerRequest = new CustomerRequest();

        $validator = Validator::make($request->all(), $customerRequest->rules(), $customerRequest->messages());
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    }
}
