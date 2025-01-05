<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
{
    return Customer::all();
}

public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:customers,email',
        'contact_number' => 'required'
    ]);

    return Customer::create($request->all());
}

public function show($id)
{
    return Customer::find($id);
}

public function update(Request $request, $id)
{
    $customer = Customer::findOrFail($id);
    $customer->update($request->all());

    return $customer;
}

public function destroy($id)
{
    Customer::destroy($id);
    return response()->json(['message' => 'Customer deleted']);
}

}
