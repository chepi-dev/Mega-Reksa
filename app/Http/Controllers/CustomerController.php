<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('Customer.index', compact('customers'));
    }

    public function create()
    {
        return view('Customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'No_Telepon' => 'nullable|string|max:255',
            'Alamat' => 'nullable|string|',
        ]);

        Customer::create([
            'Nama' => $request->Nama,
            'No_Telepon' => $request->No_Telepon,
            'Alamat' => $request->Alamat
        ]);

        return redirect()->route('Customer.index')->with([
            'success' => 'Customer created successfully'
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('Customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer  $customer)
    {
        $request->validate([
            'Nama' => 'required',
            'No_Telepon' => 'nullable|string|max:255',
            'Alamat' => 'nullable|string|',
        ]);

        $customer->update($request->all());

        return redirect()->route('Customer.index')->with([
            'success' => 'Customer updated successfully'
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('Customer.index')->with([
            'success' => 'Customer deleted successfully'
        ]);
    }
}
