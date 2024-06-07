<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.supplier', compact('suppliers'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('suppliers.supplier', compact('suppliers'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required',
            'supplier_type' => 'required',
            'company_name' => 'required',
            'contact_number' => 'required',
            'pan_card_number' => 'required',
            'pan_card' =>'file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'business_card.*' =>'file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'memo' =>'file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'remarks' => 'nullable|string|max:1000',
        ]);
    
        $supplierData = [
            'supplier_name' => $request->input('supplier_name'),
            'supplier_type' => $request->input('supplier_type'),
            'company_name' => $request->input('company_name'),
            'contact_number' => $request->input('contact_number'),
            'pan_card_number' => $request->input('pan_card_number'),
            'remarks' => $request->input('remarks'),
        ];
    
        if ($request->hasFile('business_card')) {
            $businessCardPaths = [];
            foreach ($request->file('business_card') as $file) {
                $businessCardPaths[] = $file->store('BusinessCard', 'public');
            }
            $supplierData['business_card'] = json_encode($businessCardPaths);
        }
    
        if ($request->file('pan_card')) {
            $file = $request->file('pan_card')->store('Pancard', 'public');
            $supplierData['pan_card'] = $file;
        }
        if ($request->file('memo')) {
            $file = $request->file('memo')->store('Memo', 'public');
            $supplierData['memo'] = $file;
        }   
        Supplier::create($supplierData);
    
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
    }
    
    
    
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.view', compact('supplier'));
    }
    

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_name' => 'required',
            'supplier_type' => 'required',
            'company_name' => 'required',
            'contact_number' => 'required',
            'pan_card_number' => 'required',
            'pan_card' =>'file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'business_card.*' =>'file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'memo' =>'file|mimes:jpeg,png,jpg,gif,svg,pdf,doc,docx|max:2048',
            'remarks' => 'nullable|string|max:1000',
        ]);
    
        $supplier = Supplier::findOrFail($id);
    
        $supplier->update([
            'supplier_name' => $request->input('supplier_name'),
            'supplier_type' => $request->input('supplier_type'),
            'company_name' => $request->input('company_name'),
            'contact_number' => $request->input('contact_number'),
            'pan_card_number' => $request->input('pan_card_number'),
            'remarks' => $request->input('remarks'),
        ]);
        if ($request->hasFile('business_card')) {
            $businessCardPaths = [];
            foreach ($request->file('business_card') as $file) {
                $businessCardPaths[] = $file->store('BusinessCard', 'public');
            }
            $supplier->business_card = json_encode($businessCardPaths);
        }
        if ($request->file('pan_card')) {
            $supplier->pan_card = $request->file('pan_card')->store('Pancard', 'public');
        }
        if ($request->file('memo')) {
            $supplier->memo = $request->file('memo')->store('Memo', 'public');
        }
        $supplier->save();   
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }
    
    
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        if ($supplier->business_card_path) {
            Storage::disk('public')->delete($supplier->business_card_path);
        }
    
        if ($supplier->pan_card_path) {
            Storage::disk('public')->delete($supplier->pan_card_path);
        }
    
        if ($supplier->memo_path) {
            Storage::disk('public')->delete($supplier->memo_path);
        }
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }
    
}
