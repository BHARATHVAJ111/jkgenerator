<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ManageLead;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(){
        $managelead=ManageLead::all();
        return view('sales.sales',compact('managelead'));
    }

    public function store(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'source' => 'required|string|max:255',
            'enquiry_date' => 'required|date',
            'capacity' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'cost' => 'required|string',
            'company_name' => 'required|string|max:255',
            'contact_number' => 'required|max:15',
            'email_id' => 'required|string|email|max:255',
            'location' => 'required|string|max:255',
            'quote_no' => 'required|string|max:255',
        ]);

        // Create a new Sales record
        ManageLead::create($validatedData);

        // Redirect or return a response
        return redirect()->route('sales.managelead')->with('success', 'Sales Lead Store Successfully');
    }


    public function managelead_show(){
        $managelead=ManageLead::all();
        return view('sales.managelead',compact('managelead'));
    }
}
