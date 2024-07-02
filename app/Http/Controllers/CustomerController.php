<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Method untuk menampilkan daftar pelanggan
    public function index(Request $request)
    {
        $search = $request->get('search');
        $customers = Customer::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->paginate(10);
        
        return view('Customers.index', compact('customers', 'search'));
    }

    // Method untuk menampilkan form tambah pelanggan
    public function create()
    {
        return view('Customers.create');
    }

    // Method untuk menyimpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:customers',
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Customer::create($request->all());

        return redirect()->route('Customers.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Method untuk menampilkan form edit pelanggan
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('Customers.edit', compact('customer'));
    }

    // Method untuk memperbarui data pelanggan
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $request->validate([
            'username' => 'required|unique:customers,username,' . $customer->id,
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($request->all());

        return redirect()->route('Customers.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Method untuk menghapus pelanggan
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('Customers.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}